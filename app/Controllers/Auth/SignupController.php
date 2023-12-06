<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;

class SignupController extends BaseController
{
	protected $helpers = ['url', 'form'];

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
			'password' => 'required|min_length[4]|max_length[50]',
			'termscondition' => ['label' => 'Terms Condition', 'rules' => 'required|greater_than[0]', 'errors' => ['required' => 'Please accept the Terms & Privacy Policy']]
		];

		if ($this->validate($form_rules)) {
			$userModel = new UserModel();
			$data = [
				'username' => $this->request->getVar('username'),
				'email' => $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			];
			$userModel->save($data);

			return redirect()->to('/login');
		} else {
			$data['validation'] = $this->validator;
			echo view('auth/pages/signup', $data);
		}
	}
}
