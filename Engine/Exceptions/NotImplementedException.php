<?php

namespace Liloi\BabylonV\Exceptions;

/**
 * Not implemented exception
 *
 * @package Liloi\BabylonV\Exceptions
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