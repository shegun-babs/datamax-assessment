<?php

use App\Domain\Book\Controllers\BookController;
use App\Domain\Book\Controllers\SearchBookController;
use App\Domain\Book\DTOs\BookData;
use App\Domain\Book\DTOs\BookDataCollection;
use App\Domain\Book\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('external-books', SearchBookController::class);
Route::get('v1/books', [BookController::class, 'index']);
Route::post('v1/books', [BookController::class, 'create']);
Route::delete('v1/books/{id}', [BookController::class, 'delete']);
