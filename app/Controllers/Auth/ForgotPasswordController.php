<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        $data['head_title'] = 'Forgot Password';

        return view('auth/pages/forgot-password', $data);
    }
    public function forgotPasswordAction()
    {
        $userModel = new UserModel();
        $session = session();

        $data['head_title'] = 'Forgot Password';

        if ($this->request->getPost()) {
            $form_rules = ['email' => 'required|min_length[4]|max_length[100]|valid_email'];
            if ($this->validate($form_rules)) {
                $email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
                $userdata = $userModel->verifyEmail($email);
                if (!empty($userdata)) {
                    if ($userModel->modifiedAt($userdata['id'])) {
                        $to = $email;
                        $subject = 'Reset Password';
                        $token = $userdata['id'];
                        $message = 'Hi ' . $userdata['username'] . '<br/><br/>'
                            . 'Your reset password request has been received. Please click'
                            . 'the below link to reset your password.<br/><br/>'
                            . '<a href="' . base_url() . 'reset-password/' . $token . '">Reset Password</a>'
                            . 'Thanks Crafting Connections';

                        $email = \Config\Services::email();
                        $email->setFrom('adarshpatidar.dev08@gmail.com', 'Adarsh Patidar');
                        $email->setTo($to);
                        $email->setSubject($subject);
                        $email->setMessage($message);

                        if ($email->send()) {
                            $session->setTempdata('success', 'Reset password link sent to your email address, please reset password link will be automatically expires in 15 minutes.');
                            return redirect()->to(current_url());
                        }
                    } else {
                        $session->setFlashdata('error', 'Sorry, unable to update. try again.');
                        return redirect()->to(current_url());
                    }
                } else {
                    $session->setFlashdata('error', 'Email does not exist');
                    return redirect()->to(current_url());
                }
            } else {
                $data += ['validation' => $this->validator];
                return view('auth/pages/forgot-password', $data);
            }
        }
    }
}
