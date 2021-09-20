<?php


namespace App\Domain\Book\Casts;


use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class ArrayValueCast implements  CastsAttributes
{

    public function get($model, string $key, $value, array $attributes)
    {
        return unserialize($value, ['allowed_classes' => false]);
    }


    public function set($model, string $key, $value, array $attributes)
    {
        $var = explode(",", $value);
        $var = array_map('trim', $var);
        return serialize($var);
    }
}
