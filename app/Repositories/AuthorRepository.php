<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    public function getList(array $data)
    {
        $author = Author::query();
    
        if (!empty($data['ids'])) {
            $author->whereIn('id', $data['ids']);
        }
    
        return $author->with('articles')->get();
    }

    public function create(array $data)
    {
        return Author::create($data);
    }
}
