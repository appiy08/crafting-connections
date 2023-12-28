<?php


namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Front\FrontModel;

class FrontController extends BaseController
{
	public $user_id, $articleModel, $session;
	public function __construct()
	{
		helper(['url', 'form']);
		$this->session = session();
		$this->articleModel = new FrontModel();
		$this->user_id = $this->session->get('id');
	}
	public function getArticle($article_id = null)
	{
		$isUserLoggedIn = false;
		if ($this->session->get('isLoggedIn')) {
			$isUserLoggedIn = $this->session->get('isLoggedIn');
		}

		$article_data = $this->articleModel->getArticle($article_id);
		$data = ['head_title' => ucfirst('Article'), 'is_user_logged_in' => $isUserLoggedIn, 'article_data' => $article_data];

		echo view('front/article', $data);
	}
	
}
