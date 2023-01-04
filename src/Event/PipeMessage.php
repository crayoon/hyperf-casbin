<?php

namespace Donjan\Casbin\Event;

class PipeMessage
{

    const LOAD_POLICY = 'loadPolicy';

    protected mixed $data = [];
    protected string $action;

    public function __construct(string $action, $data = [])
    {
        $this->action = $action;
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
