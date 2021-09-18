<?php


namespace App\Domain\Book\DTOs;


use Spatie\DataTransferObject\DataTransferObjectCollection;

class BookDataCollection extends DataTransferObjectCollection
{

    public static function create($data): BookDataCollection
    {
        return new static(Bookdata::arrayOf($data));
    }

}
