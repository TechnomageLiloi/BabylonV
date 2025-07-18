<?php

namespace Liloi\TARDIS\Exceptions;

/**
 * Access denied exception.
 *
 * @package Liloi\TARDIS\Exceptions
 */
class AccessException extends GeneralException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Access denied exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x102;
}