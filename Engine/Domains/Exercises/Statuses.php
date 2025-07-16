<?php

namespace Liloi\BabylonV\Domains\Exercises;
/**
 * Class Statuses.
 * @package Liloi\BabylonV\Domains\Exercises
 */
class Statuses
{
    public const DEVELOP = 1;
    public const ACTIVE = 2;
    public const DEPRECATED = 3;

    public static $list = [
        self::DEVELOP => 'Develop',
        self::ACTIVE => 'Active',
        self::DEPRECATED => 'Deprecated'
    ];
}