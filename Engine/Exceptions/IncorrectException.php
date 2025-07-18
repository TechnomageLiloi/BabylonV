<?php

namespace Liloi\TARDIS\Exceptions;

/**
 * Incorrect param exception.
 *
 * @package Liloi\TARDIS\Exceptions
 */
class IncorrectException extends GeneralException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Incorrect param exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x103;
}