<?php


namespace App\Domain\Book\Transformers;


use Illuminate\Database\Eloquent\Collection;

class BookCollectionTransformer implements TransformerContract
{

    public function __construct(private Collection $books)
    {

    }

    public function toArray()
    {
        $returnArray = [];

        if ( count($this->books) === 0 ) {
            return $returnArray;
        }

        foreach ($this->books as $book) {
            $returnArray[] = [
                "id" => $book->id,
                "name" => $book->name,
                "isbn" => $book->isbn,
                "authors" => $book->authors,
                "number_of_pages" => $book->number_of_pages,
                "publisher" => $book->publisher,
                "country" => $book->country,
                "release_date" => $book->release_date,
            ];
        }
        return $returnArray;
    }

    public function toJson(){
        return json_encode($this->toArray());
    }
}
