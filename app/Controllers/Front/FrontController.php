<?php


namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Dashboard\UserModel;
use App\Models\Front\FrontModel;

class FrontController extends BaseController
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
	public function getArticle($article_id = null)
	{
		$isUserLoggedIn = false;
		if ($this->session->get('isLoggedIn')) {
			$isUserLoggedIn = $this->session->get('isLoggedIn');
		}

		$article_data = $this->articleModel->getArticle($article_id);
		$data = ['head_title' => ucfirst('Article'), 'is_user_logged_in' => $isUserLoggedIn, 'article_data' => $article_data, 'user_data' => $this->user_data];

		echo view('front/article', $data);
	}
}
