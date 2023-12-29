<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Dashboard\UserModel;



class UserController extends BaseController
{

    public $userModel, $session, $user_id, $user_data;

    public function __construct()
    {
        helper(['menu', 'form', 'url']);
        $this->session = session();
        $this->userModel = new UserModel();
        $this->user_id = $this->session->get('id');
        $this->user_data = $this->userModel->getUserData($this->session->get('id'));
    }

    public function index()
    {
        $data = array('head_title' => 'Account Settings', 'user_data' => $this->user_data);
        return view('dashboard/account', $data);
    }

    public function updateAvatar()
    {
        $data = [
            'head_title' => 'Avatar Update',
        ];

        $validationRule = [
            'avatar' => [
                'label' => 'Avatar',
                'rules' => [
                    'uploaded[avatar]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[avatar,1024]',
                ],
            ],
        ];

        if ($this->request->is('post')) {
            $file = $this->request->getFile('avatar');
            echo '<FILE>';
            print_r($file);
            if ($this->validate($validationRule)) {
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->move(FCPATH . 'uploads\users', $file->getRandomName())) {
                        $avatar_path = base_url() . 'uploads/users/' . $file->getName();
                        $status = $this->userModel->updateAvatar($this->user_id, $avatar_path);
                        if ($status === true) {
                            $this->session->setTempdata('success', 'Avatar is uploaded successfully', 3);
                            return redirect()->to('/dashboard/account');
                        } else {
                            $this->session->setTempdata('error', 'Sorry! Unable to upload Avatar', 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $this->session->setTempdata('error', $file->getErrorString(), 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setTempdata('error', $file->getErrorString(), 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data += ['validation' => $this->validator];
                return view('dashboard/avatar_update', $data);
            }
        } else {
            return view('dashboard/avatar_update', $data);
        }
    }
    public function updateAccount()
    {
        $data = [
            'head_title' => 'Account Update', 'user_data' => $this->user_data
        ];

        $validationRule = [
            'username' => [
                'label' => 'User Name',
                'rules' => 'required|min_length[2]|max_length[50]',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|min_length[4]|max_length[100]|valid_email'
            ],
        ];

        if ($this->request->is('post')) {
            if ($this->validate($validationRule)) {
                $user_data = [
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'gender' => $this->request->getVar('gender'),
                    'bio' => $this->request->getVar('bio'),
                ];
                $status = $this->userModel->updateAccount($this->user_id, $user_data);
                if ($status === true) {
                    $this->session->setTempdata('success', 'Account updated successfully', 3);
                    return redirect()->to('/dashboard/account');
                } else {
                    $this->session->setTempdata('error', 'Sorry! Unable to update Account', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data += ['validation' => $this->validator];
                return view('dashboard/account_update', $data);
            }
        } else {
            return view('dashboard/account_update', $data);
        }
    }
}
