<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    protected $articleService;

    /**
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function getList(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'article_ids' => 'nullable|array',
                'article_ids.*' => 'integer', 
                'author_ids' => 'nullable|array', 
                'author_ids.*' => 'integer', 
            ]);
            $result = $this->articleService->getList($validatedData);
            return response()->json(['result' => $result]);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create(ArticleRequest $request)
    {
        try {
            $validatedData = $request->validated();
            return $this->articleService->create($validatedData);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
