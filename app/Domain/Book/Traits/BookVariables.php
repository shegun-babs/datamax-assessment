<?php


namespace App\Domain\Book\Traits;


trait BookVariables
{

    public $name;
    public $isbn;
    public $authors;
    public $publisher;
    public $country;
    public $number_of_pages;
    public $release_date;


    public function fieldList(){
        return [
            'name', 'isbn', 'authors', 'publisher', 'country', 'number_of_pages', 'release_date'
        ];
    }
}
