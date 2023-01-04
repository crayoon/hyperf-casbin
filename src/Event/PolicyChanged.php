<?php

namespace Donjan\Casbin\Event;

class PolicyChanged
{

    protected array $data = [];

    public function __construct(...$data)
    {
        $this->data = $data;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}
