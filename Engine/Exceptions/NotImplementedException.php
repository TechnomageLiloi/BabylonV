<?php

namespace Liloi\BOYARD\Exceptions;

/**
 * Not implemented exception
 *
 * @package Liloi\BOYARD\Exceptions
 */
class NotImplementedException extends GeneralException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Not implemented exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x105;
}