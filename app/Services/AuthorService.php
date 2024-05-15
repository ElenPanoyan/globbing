<?php

namespace App\Services;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getList(array $data)
    {
        return $this->authorRepository->getList($data);
    }

    public function create(array $data)
    {
        return $this->authorRepository->create($data);
    }
}