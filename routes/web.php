<?php

use App\Domain\Book\Livewire\BookRecord;
use App\Domain\Book\Livewire\EditBookRecord;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books');
Route::get('books', BookRecord::class)->name('home');
Route::get('books/{book_id}/edit', EditBookRecord::class)->name('book.edit');
