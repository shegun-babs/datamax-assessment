<?php


namespace App\Domain\Book\Transformers;


use App\Domain\Book\Models\Book;

class BookTransformer implements TransformerContract
{

    public function __construct(private Book $book)
    {
    }


    public function toArray(): array
    {
        return [
            "id" => $this->book->id,
            "name" => $this->book->name,
            "isbn" => $this->book->isbn,
            "authors" => $this->book->authors,
            "number_of_pages" => $this->book->number_of_pages,
            "publisher" => $this->book->publisher,
            "country" => $this->book->country,
            "release_date" => $this->book->release_date,
        ];
    }


    public function toJson(): string {
        return json_encode($this->toArray());
    }


    public function __toString(): string {
        return $this->toJson();
    }
}
