<?php

namespace Liloi\BabylonV\Exceptions;

/**
 * Undefined exception.
 *
 * @package Liloi\BabylonV\Exceptions
 */
class UndefinedException extends GeneralException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Undefined exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x104;
}