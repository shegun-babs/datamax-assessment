<?php


namespace App\Domain\Book\DTOs;


use Spatie\DataTransferObject\FlexibleDataTransferObject;

class BookData extends FlexibleDataTransferObject
{

    public string $name;
    public string $isbn;
    public array $authors;
    public int $numberOfPages;
    public string $publisher;
    public string $country;
    public string $released;
}
