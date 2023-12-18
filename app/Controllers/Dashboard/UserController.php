<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Dashboard\UserModel;



class UserController extends BaseController
{

    public $userModel, $session, $user_id;

    public function __construct()
    {
        helper(['menu', 'form', 'url']);
        $this->session = session();
        $this->userModel = new UserModel();

        $this->user_id = $this->session->get('id');
    }

    public function index()
    {
        $data = array('head_title' => 'Account Settings');
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
                    'uploaded[avatar_image]',
                    'is_image[avatar_image]',
                    'mime_in[avatar_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[avatar_image,1024]',
                ],
            ],
        ];

        if ($this->request->is('post')) {
            $file = $this->request->getFile('avatar');
            if ($this->validate($validationRule)) {
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->move(FCPATH . 'public\uploads\users', $file->getRandomName())) {
                        $avatar_path = base_url() . '/public/uploads/users/' . $file->getName();
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
                }
            } else {
                $data += ['validation' => $this->validator];
                return view('dashboard/avatar_update', $data);
            }
        } else {
            return view('dashboard/avatar_update', $data);
        }
    }
}
