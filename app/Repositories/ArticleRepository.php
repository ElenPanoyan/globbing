<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function getList(array $data)
    {
        $article = Article::query();
    
        if (!empty($data['article_ids'])) {
            $article->whereIn('id', $data['article_ids']);
        }

        if (!empty($data['author_ids'])) {
            $article->whereIn('author_id', $data['author_ids']);
        }

        return $article->with('author')->get();
    }
    

    public function create(array $data)
    {
        return Article::create($data);
    }
}
