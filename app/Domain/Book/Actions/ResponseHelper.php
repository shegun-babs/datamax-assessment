<?php


namespace App\Domain\Book\Actions;


class ResponseHelper implements ResponseHelperInterface
{

    private array $vars;

    public function __construct(array $vars=[]){

        $this->vars = $vars;
    }


    public function setStatusCode($statusCode): self
    {
        $this->vars['status_code'] = $statusCode;
        return $this;
    }


    public function setStatus($status): self
    {
        $this->vars['status'] = $status;
        return $this;
    }


    public function setMessage($message): self
    {
        $this->vars['message'] = $message;
        return $this;
    }


    public function setData($data): self
    {
        $this->vars['data'] = $data;
        return $this;
    }


    public function toArray(): array
    {
        return $this->vars;
    }


    public function reset(){
        $this->vars = [];
    }


    public function __get($name)
    {
        if ( array_key_exists($name, $this->vars) ){
            return $this->vars[$name];
        }
    }
}
