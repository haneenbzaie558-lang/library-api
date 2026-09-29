
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// routes/api.php

use App\Http\Controllers\BookController;

// Route::get('/books/{id}', [BookController::class, 'show']);
//test
Route::apiResource('books', BookController::class);
Route::apiResource('authors', \App\Http\Controllers\AuthorController::class);
Route::apiResource('borrowings', \App\Http\Controllers\BorrowingController::class);
Route::apiResource('users', \App\Http\Controllers\UserController::class);
Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);
