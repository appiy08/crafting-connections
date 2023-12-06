<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;
use DateTime;

class LoginController extends BaseController
{
    protected $helpers = ['url', 'form', 'cookie'];

    public function index()
    {
        $data = ['head_title' => 'Login'];

        echo view('auth/pages/login', $data);
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();

        $data = [
            'head_title' => 'login'
        ];

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $rememberPassword = $this->request->getVar('remember-password');

        $user_data = $userModel->where('email', $email)->first();

        $form_rules = [
            'email' => 'required|min_length[4]|max_length[100]|valid_email',
            'password' => 'required|min_length[4]|max_length[50]',
        ];

        if ($this->validate($form_rules)) {
            if ($user_data) {
                $pass = $user_data['password'];
                $authenticatePassword = password_verify($password, $pass);
                if ($authenticatePassword) {
                    $user_data = [
                        'id' => $user_data['id'],
                        'name' => $user_data['username'],
                        'email' => $user_data['email'],
                        'isLoggedIn' => TRUE
                    ];

                    $session->set($user_data);

                    $n = 20;
                    $randomString = bin2hex(random_bytes($n));

                    if ($rememberPassword > 0) {

                        delete_cookie('remember_me_token');

                        $remember_me_token = array(
                            'name'   => 'remember_me_token',
                            'value'  => $randomString,
                            'expire' => new DateTime('+14 days'),
                            'path'   => '/',
                        );

                        set_cookie($remember_me_token);

                        $update_data = ['remember_me_token' => $randomString];
                        $userModel->update($user_data['id'], $update_data);
                    }

                    return redirect()->to('/dashboard');
                } else {
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    $data += ['flash_msg' => $session->getFlashdata('msg')];
                    echo view('auth/pages/login', $data);
                }
            } else {
                $session->setFlashdata('msg', 'Email does not exist.');
                $data += ['flash_msg' => $session->getFlashdata('msg')];
                echo view('auth/pages/login', $data);
            }
        } else {
            $data += ['validation' => $this->validator];
            echo view('auth/pages/login', $data);
        }
    }
}
