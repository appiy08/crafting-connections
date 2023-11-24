<?php


namespace App\Controllers\Common;

use App\Controllers\BaseController;

class HomeController extends BaseController {

	public function index($page = 'home') {
		$data = ['head_title' => ucfirst($page)]; // Capitalize the first letter

		echo view('common/pages/index', $data);
	}
}
