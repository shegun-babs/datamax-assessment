<?php


namespace App\Domain\Book\Transformers;


interface TransformerContract
{

    public function toArray();

    public function toJson();
}
