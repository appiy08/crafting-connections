<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class ArticleController extends BaseController {
    public function __construct()
    {
        helper(['menu','form','url']);
    }

    public function index() {
        $data['head_title'] = 'Article Management';
        return view('dashboard/create_article',$data);
    }
}

?>