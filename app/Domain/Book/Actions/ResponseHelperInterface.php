<?php


namespace App\Domain\Book\Actions;


interface ResponseHelperInterface
{

    public function setStatusCode($statusCode);

    public function setStatus($status);

    public function setMessage($message);

    public function setData($data);
}
