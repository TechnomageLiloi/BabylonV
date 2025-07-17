<?php

namespace Liloi\BabylonV\Exceptions;

/**
 * Not found exception.
 *
 * @package Liloi\BabylonV\Exceptions
 */
class NotFoundException extends GeneralException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Not found exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x106;
}