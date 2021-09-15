<?php

namespace Benjafield\Rackspace\Exceptions;

use Exception;
use Throwable;

class ResourceException extends Exception
{
    /**
     * The resource the exception has come from.
     *
     * @var mixed
     */
    protected $resource;

    /**
     * Create a new ResourceException instance.
     *
     * @param  mixed  $resource
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null $previous
     * @return void
     */
    public function __construct($resource, $message, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the string representation of the exception.
     *
     * @return string
     */
    public function __toString()
    {
        return "$this->resource: " . parent::__toString();
    }
}