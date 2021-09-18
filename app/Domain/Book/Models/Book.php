<?php

namespace App\Domain\Book\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'isbn', 'authors', 'country', 'number_of_pages', 'publisher', 'release_date',
    ];

    protected $casts = [
        'authors' => 'array',
        'number_of_pages' => 'integer',
    ];


    public function saveAuthorsAttribute($value): void
    {
        $authorsArray = explode(',', $value);
        array_map('trim', $authorsArray);
        $this->attributes['authors'] = $authorsArray;
    }
}
