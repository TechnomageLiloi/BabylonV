<?php

namespace Liloi\BabylonV\Exceptions;

/**
 * Access denied exception.
 *
 * @package Liloi\BabylonV\Exceptions
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