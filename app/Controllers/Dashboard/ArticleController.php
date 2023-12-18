<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Dashboard\ArticleModel;
use CodeIgniter\I18n\Time;


class ArticleController extends BaseController
{

    public $articleModel, $session, $categories_data, $user_id;

    public function __construct()
    {
        helper(['menu', 'form', 'url']);
        $this->session = session();
        $this->articleModel = new ArticleModel();
        $this->categories_data = $this->articleModel->getCategories();
        $this->user_id = $this->session->get('id');
    }

    public function index()
    {
        $articles = $this->articleModel->getArticles($this->user_id);
        $data = ['head_title' => 'My Articles', 'articles_data' => $articles,];
        return view('dashboard/articles', $data);
    }
    public function createArticle()
    {
        $data = [
            'head_title' => 'Article Creation',
            'categories_data' => $this->categories_data, 'session' => $this->session
        ];

        $validationRule = [
            'article_title' => [
                'label' => 'Article Title',
                'rules' => 'required|max_length[100]'
            ],
            'article_content' => [
                'label' => 'Article Content',
                'rules' => 'required'
            ],
            'category_id' => [
                'label' => 'Category',
                'rules' => 'required'
            ]
        ];

        if ($this->request->is('post')) {
            if ($this->validate($validationRule)) {
                $article_data = [
                    'article_title' => $this->request->getVar('article_title'),
                    'article_content' => $this->request->getVar('article_content'),
                    'category_id' => $this->request->getVar('article_category'),
                    'author_id' => $this->user_id,
                    'created_at' => new Time('now'),
                ];
                $status = $this->articleModel->createArticle($article_data);
                if ($status === true) {
                    $this->session->setTempdata('success', 'Article created successfully', 3);
                    return redirect()->to('/dashboard/article');
                } else {
                    $this->session->setTempdata('error',  'Sorry! Unable to create Article', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data += ['validation' => $this->validator];
                return view('dashboard/create_article', $data);
            }
        } else {
            return view('dashboard/create_article', $data);
        }
    }
    // public function createArticle()
    // {
    //     $data = [
    //         'head_title' => 'Article Creation',
    //         'categories_data' => $this->categories_data, 'session' => $this->session
    //     ];

    //     $validationRule = [
    //         'article_title' => [
    //             'label' => 'Article Title',
    //             'rules' => 'required|max_length[100]'
    //         ],
    //         'article_image' => [
    //             'label' => 'Article Image',
    //             'rules' => [
    //                 'uploaded[article_image]',
    //                 'is_image[article_image]',
    //                 'mime_in[article_image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
    //                 'max_size[article_image,1024]',
    //             ],
    //         ],
    //         'article_content' => [
    //             'label' => 'Article Content',
    //             'rules' => 'required'
    //         ]
    //     ];

    //     if ($this->request->is('post')) {
    //         $file = $this->request->getFile('article_image');
    //         if ($this->validate($validationRule)) {
    //             if ($file->isValid() && !$file->hasMoved()) {
    //                 if ($file->move(FCPATH . 'uploads', $file->getRandomName())) {

    //                     $image_path = base_url() . 'public/uploads/' . $file->getName();
    //                     $article_data = [
    //                         'article_title' => $this->request->getVar('article_title'),
    //                         'article_image' => $image_path,
    //                         'article_content' => $this->request->getVar('article_content'),
    //                         'category_id' => $this->request->getVar('article_category'),
    //                         'author_id' => $this->user_id,
    //                         'created_at' => new Time('now'),
    //                     ];
    //                     $status = $this->articleModel->createArticle($article_data);
    //                     if ($status === true) {
    //                         $this->session->setTempdata('success', 'Form submited successfully', 3);
    //                         return redirect()->to('/dashboard/article');
    //                     } else {
    //                         $this->session->setTempdata('error', $file->getErrorString() . '<br/> Something went wrong', 3);
    //                         return redirect()->to(current_url());
    //                     }
    //                 } else {
    //                     $this->session->setTempdata('error', $file->getErrorString() . '<br/> Something went wrong', 3);
    //                     return redirect()->to(current_url());
    //                 }
    //             }
    //         } else {
    //             $data += ['validation' => $this->validator];
    //             return view('dashboard/create_article', $data);
    //         }
    //     } else {
    //         return view('dashboard/create_article', $data);
    //     }
    // }
    public function getDateTimeDiffs($datetime)
    {
        $current = Time::now();
        $test    = Time::parse($datetime);
        $diff = $current->difference($test);
        return $diff->humanize();
    }
}
