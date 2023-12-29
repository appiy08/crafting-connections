<?php


namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Dashboard\UserModel;
use App\Models\Front\FrontModel;

class HomeController extends BaseController
{
	public $user_id, $articleModel, $userModel, $session, $user_data;
	public function __construct()
	{
		helper(['url', 'form']);
		$this->session = session();
		$this->articleModel = new FrontModel();
		$this->userModel = new UserModel();
		$this->user_id = $this->session->get('id');
		$this->user_data = $this->userModel->getUserData($this->session->get('id'));
	}
	public function index()
	{

		$isUserLoggedIn = false;
		if ($this->session->get('isLoggedIn')) {
			$isUserLoggedIn = $this->session->get('isLoggedIn');
		}

		$articles = $this->articleModel->getArticlesList();
		$data = ['head_title' => ucfirst('home'), 'is_user_logged_in' => $isUserLoggedIn, 'articles_data' => $articles,'user_data'=>$this->user_data];

		echo view('front/home', $data);
	}
}
