<?php


namespace App\Domain\Book\Helpers;


interface ResponseHelperInterface
{

    public function setStatusCode($statusCode);

    public function setStatus($status);

    public function setMessage($message);

    public function setData($data);
}
