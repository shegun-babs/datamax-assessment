<?php


namespace App\Domain\Book\Traits;


trait BookValidationRules
{

    public function rulesForStore(): array {
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


    public function rulesForUpdate(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string'],
            'isbn' => ['sometimes', 'required', 'string'],
            'authors' => ['sometimes', 'required', 'string'],
            'country' => ['sometimes', 'required', 'string'],
            'number_of_pages' => ['sometimes', 'required', 'numeric'],
            'publisher' => ['sometimes', 'required', 'string'],
            'release_date' => ['sometimes', 'required', 'date'],
        ];
    }
}
