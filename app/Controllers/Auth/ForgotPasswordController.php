<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;

class ForgotPasswordController extends BaseController
{
    public $userModel, $session;
    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = session();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data['head_title'] = 'Forgot Password';

        return view('auth/pages/reset_password_link_sent', $data);
    }
    public function resetPasswordLinkSentAction()
    {
        $data['head_title'] = 'Forgot Password';

        if ($this->request->is('post')) {
            $form_rules = ['email' => 'required|min_length[4]|max_length[100]|valid_email'];

            if ($this->validate($form_rules)) {
                $email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
                $userdata = $this->userModel->verifyEmail($email);

                if (!empty($userdata)) {

                    if ($this->userModel->updatedAt($userdata['id'])) {
                        $to = $email;
                        $subject = 'Reset Password';
                        $token = $userdata['uniid'];

                        $email_body_data = [
                            'user_email' => $to,
                            'pass_reset_link' => base_url() . 'reset-password/' . $token
                        ];

                        $email = \Config\Services::email();

                        $email->setFrom('adarsh.patidar.dev.8120@outlook.com', 'Reset Password');
                        $email->setTo($to);
                        $email->setSubject($subject);
                        $email->setMessage(view('email-template/reset_password', $email_body_data));

                        if ($email->send()) {
                            $this->session->setTempdata('success', 'Password reset link sent to your email address. Link will be expires in 15 minutes.', 3);
                            $data +=  ['session' => $this->session];
                            return view('auth/pages/reset_password_link_sent', $data);
                        } else {
                            $this->session->setTempdata('error', 'Sorry, unable to sent email. try again.', 3);
                            $data += ['session' => $this->session];
                            return view('auth/pages/reset_password_link_sent', $data);
                        }
                    } else {
                        $this->session->setTempdata('error', 'Sorry, unable to update. try again.', 3);
                        $data += ['session' => $this->session];
                        return view('auth/pages/reset_password_link_sent', $data);
                    }
                } else {
                    $this->session->setTempdata('error', 'Email does not exist', 3);
                    $data += ['session' => $this->session];
                    return view('auth/pages/reset_password_link_sent', $data);
                }
            } else {
                $data += ['validation' => $this->validator];
                return view('auth/pages/reset_password_link_sent', $data);
            }
        }
    }
    public function resetPasswordAction($token = null)
    {
        $data['head_title'] = 'Reset Password';
        if (!empty($token)) {
            $data += ['token' => $token];
            $userdata = $this->userModel->verifyToken($token);
            if (!empty($userdata)) {
                if ($this->checkExpiryDate($userdata['updated_at'])) {
                    if ($this->request->is('post')) {
                        $form_rules = ['password' => ['label' => 'Password', 'rules' => 'required|min_length[6]|max_length[18]'], 'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'required|matches[password]']];
                        if ($this->validate($form_rules)) {
                            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                            if ($this->userModel->updatePassword($token, $password)) {
                                $this->session->setTempdata('success', 'Password updated successfully. Login now.', 3);
                                return redirect()->to('/login');
                            } else {
                                $this->session->setTempdata('error', 'Sorry, Unable to update password, try again.', 3);
                                return redirect()->to(current_url());
                            }
                        } else {
                            $data['validation'] = $this->validator;
                        }
                    }
                } else {
                    $data['error'] = 'Reset password link was expired';
                }
            } else {
                $data['error'] = 'Unable to find user account';
            }
        } else {
            $data['error'] = 'Sorry! Unauthorized access';
        }

        return view('auth/pages/reset_password', $data);
    }
    public function checkExpiryDate($time)
    {
        $update_time = strtotime($time);
        $current_time = time();
        $timeDiff = ($current_time - $update_time) / 60;
        if ($timeDiff < 900) {
            return true;
        } else {
            return false;
        }
    }
}
