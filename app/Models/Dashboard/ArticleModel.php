<?php

namespace App\Models\Dashboard;

use CodeIgniter\Model;

class ArticleModel extends Model
{

    protected $DBGroup = 'default';
    protected $table = 'articles';
    protected $allowedFields = [
        'article_id',
        'article_title',
        'article_image',
        'article_content',
        'category_id',
        'author_id',
        'created_at',
        'updated_at'
    ];

    public function getArticlesList($uid)
    {
        $builder = $this->db->table('articles');
        $builder->select('articles.article_id,articles.article_title,articles.article_image,articles.article_content,articles.category_id,articles.author_id,articles.created_at,articles.updated_at,users.id,users.username,article_categories.category_id,article_categories.category_title');
        $builder->where('author_id', $uid);
        $builder->join('users', 'users.id = articles.author_id', 'inner');
        $builder->join('article_categories', 'article_categories.category_id = articles.category_id', 'inner');
        $query = $builder->get();
        $result = $query->getResultArray();
        if (count($result) >= 1) {
            return $result;
        } else {
            return false;
        }
    }
    public function getArticle($article_id)
    {
        $builder = $this->db->table('articles');
        $builder->select('articles.article_id,articles.article_title,articles.article_image,articles.article_content,articles.category_id,articles.author_id,articles.created_at,articles.updated_at,users.id,users.username,article_categories.category_id,article_categories.category_title');
        $builder->where('article_id', $article_id);
        $builder->join('users', 'users.id = articles.author_id', 'inner');
        $builder->join('article_categories', 'article_categories.category_id = articles.category_id', 'inner');
        $query = $builder->get();
        $result = $query->getResultArray();
        if (count($result) >= 1) {
            return $result;
        } else {
            return false;
        }
    }

    public function getCategories()
    {
        $builder = $this->db->table('article_categories');
        $query = $builder->get();
        $result = $query->getResultArray();
        if (count($result) >= 1) {
            return $result;
        } else {
            return false;
        }
    }

    public function createArticle($data)
    {
        $builder = $this->db->table('articles');
        $result = $builder->insert($data);
        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
     public function updateArticle($article_id,$article_data)
    {
        $builder = $this->db->table('articles');
        $builder->where('article_id',$article_id);
        $builder->update($article_data);
        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
