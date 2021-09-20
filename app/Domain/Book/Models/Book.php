<?php

namespace App\Domain\Book\Models;

use App\Domain\Book\Casts\ArrayValueCast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'isbn', 'authors', 'country', 'number_of_pages', 'publisher', 'release_date',
    ];

    protected $casts = [
        'authors' => ArrayValueCast::class,
        'number_of_pages' => 'integer',
        'release_date' => 'datetime:Y-m-d'
    ];


    public function getReleaseDateAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');
    }
}
