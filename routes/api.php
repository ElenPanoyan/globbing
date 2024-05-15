<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// ------------------------------ ARTICLES ROUTES ------------------------------------------
Route::post('/articles', [ArticleController::class, 'getList']);
Route::post('/articles/create', [ArticleController::class, 'create']);

// ------------------------------ AUTHORS ROUTES ------------------------------------------
Route::post('/authors', [AuthorController::class, 'getList']);
Route::post('/authors/create', [AuthorController::class, 'create']);