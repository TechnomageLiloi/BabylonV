<?php

namespace Liloi\BOYARD\Exceptions;

/**
 * Not found exception.
 *
 * @package Liloi\BOYARD\Exceptions
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