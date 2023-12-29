<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Dashboard\ArticleModel;
use App\Models\Dashboard\UserModel;

class DashboardController extends BaseController
{
    public $userModel, $articleModel, $session, $user_id, $user_data, $articles_list;

    public function __construct()
    {
        helper(['menu', 'form', 'url']);
        $this->session = session();
        $this->userModel = new UserModel();
        $this->articleModel = new ArticleModel();
        $this->user_id = $this->session->get('id');
        $this->user_data = $this->userModel->getUserData($this->session->get('id'));
        $this->articles_list = $this->articleModel->getArticlesList($this->user_id);
    }

    public function index()
    {
        $data = ['head_title' => ucfirst('Dashboard'), 'user_data' => $this->user_data, 'articles_list' => $this->articles_list];

        echo view('dashboard/index', $data);
    }
}
