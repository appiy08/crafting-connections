<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;



class LoginController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        $data = [
            'head_title' => ucfirst('Login')
        ];
        echo view('auth/pages/login', $data);
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $user_data = [
                    'id' => $data['id'],
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($user_data);

                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }
    public function logoutAuth()
    {
        $session = session();
        $session->destroy();
        redirect('/login');
    }
}
