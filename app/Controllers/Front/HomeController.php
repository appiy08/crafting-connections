<?php


namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Front\FrontModel;

class HomeController extends BaseController
{
	public $user_id, $articleModel, $session;
	public function __construct()
	{
		helper(['url', 'form']);
		$this->session = session();
		$this->articleModel = new FrontModel();
		$this->user_id = $this->session->get('id');
	}
	public function index()
	{

		$isUserLoggedIn = false;
		if ($this->session->get('isLoggedIn')) {
			$isUserLoggedIn = $this->session->get('isLoggedIn');
		}

		$articles = $this->articleModel->getArticlesList();
		$data = ['head_title' => ucfirst('home'), 'is_user_logged_in' => $isUserLoggedIn, 'articles_data' => $articles];

		echo view('front/home', $data);
	}
	
}
