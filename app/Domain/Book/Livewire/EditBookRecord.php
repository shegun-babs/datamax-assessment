<?php

namespace App\Domain\Book\Livewire;

use App\Domain\Book\Traits\BookValidationRules;
use App\Domain\Book\Traits\BookVariables;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EditBookRecord extends Component
{
    use BookValidationRules, BookVariables;

    public $book_id;


    public function editRecord()
    {
        $validated = $this->validate($this->rulesForUpdate());
        $response = Http::patch(
            route('books.update', ['book' => $this->book_id]),
            $validated
        );

        flash()->overlay($response->json()["message"], "Book updated");
        return redirect()->route('home');
    }


    public function mount($book_id)
    {
        $this->book_id = $book_id;
        $response = Http::get(route('books.show', ['book' => $this->book_id]));

        if ($response->json()["status_code"] === 404)
        {
            return redirect()->route('home');
        }
        $this->assignDataToVars($response->json()["data"]);
    }


    public function render()
    {
        return view('book.edit-book-record')
            ->layoutData(["page_title" => "Edit Book: {$this->name}"]);
    }


    private function assignDataToVars($data): void
    {
        if ( count($data) )
        {
            foreach ($this->fieldList() as $item){
                $this->{$item} = is_array($data[$item]) ? implode(", ", $data[$item]) : $data[$item];
            }
        }
    }
}
