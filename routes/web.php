<?php

use App\Http\Controllers\ArticleController;
use App\Http\Resources\CommentResource;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::controller(ArticleController::class)->group(function() {
//     Route::get("/article", "article");
// });

Route::resource('articles', ArticleController::class);

/**
 * Comments API without Authentication
 * http://localhost:8000/comments/1
 */
Route::get('/comments/{id}', function (string $id) {
    return CommentResource::collection(Article::query()->where('id', $id)->first()->comments);
});