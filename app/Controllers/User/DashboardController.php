<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
	public function index()
	{
		$data = ['head_title' => ucfirst('Dashboard')];

		echo view('user/pages/index', $data);
	}
}
