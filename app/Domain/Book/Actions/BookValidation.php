<?php


namespace App\Domain\Book\Actions;


class BookValidation
{

    public static function init(): BookValidation
    {
        return new static();
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'isbn' => ['required', 'string'],
            'authors' => ['required', 'string'],
            'country' => ['required', 'string'],
            'number_of_pages' => ['required', 'numeric'],
            'publisher' => ['required', 'string'],
            'release_date' => ['required', 'date'],
        ];
    }
}
