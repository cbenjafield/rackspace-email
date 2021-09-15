<?php

namespace Benjafield\Rackspace\Exceptions;

use Exception;
use Throwable;

class RackspaceClientException extends Exception
{
    /**
     * Redefine the exception so the message parameter isn't optional.
     *
     * @param $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Return the string representation of the exception.
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": $this->message\n";
    }
}