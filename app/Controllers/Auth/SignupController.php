<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;

class SignupController extends BaseController
{
	public $userModel;
	public function __construct()
	{
		helper(['form','url']);
		$this->userModel = new UserModel();
	}
	public function index()
	{
		$data = ['head_title' => ucfirst('Signup')];
		echo view('auth/pages/signup', $data);
	}

	public function store()
	{
		$data = ['head_title' => 'Signup'];

		$form_rules = [
			'username' => 'required|min_length[2]|max_length[50]',
			'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
			'password' => 'required|min_length[6]|max_length[18]',
			'termscondition' => ['label' => 'Terms Condition', 'rules' => 'required|greater_than[0]', 'errors' => ['required' => 'Please accept the Terms & Privacy Policy']]
		];

		if ($this->validate($form_rules)) {
			$uniid = md5(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789' . time()));
			$user_data = [
				'username' => $this->request->getVar('username'),
				'email' => $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'uniid' => $uniid,
				'created_at' => date('y-m-d h:i:s')
			];
			$this->userModel->save($user_data);

			return redirect()->to('/login');
		} else {
			$data['validation'] = $this->validator;
			echo view('auth/pages/signup', $data);
		}
	}
}
