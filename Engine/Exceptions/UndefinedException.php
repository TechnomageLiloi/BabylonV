<?php

namespace Liloi\BOYARD\Exceptions;

/**
 * Undefined exception.
 *
 * @package Liloi\BOYARD\Exceptions
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