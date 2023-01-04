<?php

namespace Donjan\Casbin\Exceptions;

use Hyperf\HttpMessage\Exception\HttpException;

class UnauthorizedException extends HttpException
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(403, 'This action is unauthorized.');
    }
}
