<?php


namespace App\Controllers\Common;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		helper('cookie');

		$session = session();

		$isUserLoggedIn = false;
		if ($session->get('isLoggedIn')) {
			$isUserLoggedIn = $session->get('isLoggedIn');
		}
		// die();

		$data = ['head_title' => ucfirst('home'), 'is_user_logged_in' => $isUserLoggedIn]; // Capitalize the first letter

		echo view('common/pages/index', $data);
	}
}
