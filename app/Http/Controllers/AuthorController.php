<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Services\AuthorService;
use Exception;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    /**
     * @var AuthorService
     */
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }


    public function getList(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'ids' => 'nullable|array',
                'ids.*' => 'integer'
            ]);
            $result = $this->authorService->getList($validatedData);
            return response()->json(['result' => $result]);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function create(AuthorRequest $request)
    {
        try {
            $validatedData = $request->validated();
            return $this->authorService->create($validatedData);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

