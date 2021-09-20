<?php

use App\Domain\Book\Controllers\BookController;
use App\Domain\Book\Controllers\SearchBookController;
use Illuminate\Support\Facades\Route;

Route::get('external-books', SearchBookController::class);

Route::prefix('v1')->group(function()
{
    Route::resource('books', BookController::class)->except([
        'create', 'edit'
    ]);
});

