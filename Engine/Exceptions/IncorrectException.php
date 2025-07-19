<?php

namespace Liloi\BOYARD\Exceptions;

/**
 * Incorrect param exception.
 *
 * @package Liloi\BOYARD\Exceptions
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