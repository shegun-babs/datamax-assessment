<?php

namespace App\Domain\Book\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class BookRecord extends Component
{
    public $showModal = false;


    public function render()
    {
        $response = Http::get(route('books.index', ['limit' => 10]));
        //dd($response->json());
        return view('book.book-record', ['data' => $response->json()["data"]])
            ->layoutData(['page_title' => "Book Records"]);
    }
}
