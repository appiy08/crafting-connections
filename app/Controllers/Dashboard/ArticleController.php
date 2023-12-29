<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Dashboard\ArticleModel;
use App\Models\Dashboard\UserModel;
use CodeIgniter\I18n\Time;


class ArticleController extends BaseController
{

    public $articleModel, $userModel, $session, $categories_data, $user_id, $user_data;

    public function __construct()
    {
        helper(['menu', 'form', 'url']);
        $this->session = session();
        $this->articleModel = new ArticleModel();
        $this->userModel = new UserModel();
        $this->categories_data = $this->articleModel->getCategories();
        $this->user_id = $this->session->get('id');
        $this->user_data = $this->userModel->getUserData($this->session->get('id'));
    }

    public function index()
    {
        $articles = $this->articleModel->getArticlesList($this->user_id);
        $data = ['head_title' => 'My Articles', 'articles_data' => $articles, 'user_data' => $this->user_data];
        return view('dashboard/articles', $data);
    }
    public function createArticle()
    {
        $data = [
            'head_title' => 'Article Creation',
            'categories_data' => $this->categories_data, 'session' => $this->session, 'user_data' => $this->user_data
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
                    'category_id' => $this->request->getVar('category_id'),
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
                return view('dashboard/article_create', $data);
            }
        } else {
            return view('dashboard/article_create', $data);
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
    //                         'category_id' => $this->request->getVar('category_id'),
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
    //             return view('dashboard/article_create', $data);
    //         }
    //     } else {
    //         return view('dashboard/article_create', $data);
    //     }
    // }
    public function updateArticle($article_id = null)
    {
        $article_data = $this->articleModel->getArticle($article_id);
        $data = [
            'head_title' => 'Article Edit',
            'categories_data' => $this->categories_data, 'session' => $this->session,
            'article_data' => $article_data, 'user_data' => $this->user_data
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
                    'category_id' => $this->request->getVar('category_id'),
                ];
                $status = $this->articleModel->updateArticle($article_id, $article_data);
                if ($status === true) {
                    $this->session->setTempdata('success', 'Article updated successfully', 3);
                    return redirect()->to('/dashboard/article');
                } else {
                    $this->session->setTempdata('error',  'Sorry! Unable to update Article', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data += ['validation' => $this->validator];
                return view('dashboard/article_edit', $data);
            }
        } else {
            return view('dashboard/article_edit', $data);
        }
    }
    public function getDateTimeDiffs($datetime)
    {
        $current = Time::now();
        $test    = Time::parse($datetime);
        $diff = $current->difference($test);
        return $diff->humanize();
    }
}
