<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
	public function index()
	{
		$data = ['head_title' => ucfirst('Dashboard')];

		echo view('dashboard/pages/index', $data);
	}
}
