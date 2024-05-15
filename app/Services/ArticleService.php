<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getList(array $data)
    {
        return $this->articleRepository->getList($data);
    }

    public function create(array $data)
    {
        return $this->articleRepository->create($data);
    }
}