<?php

namespace Liloi\BOYARD\Domains\Puzzles;

/**
 * Puzzle statuses.
 *
 * @package Liloi\BOYARD\Domains\Puzzles
 */
class Statuses
{
    /**
     * Develop of the puzzle.
     */
    public const DEVELOP = 1;

    /**
     * Active puzzle.
     */
    public const ACTIVE = 2;

    /**
     * Deprecated and invisible puzzle.
     */
    public const DEPRECATED = 3;

    /**
     * Status list.
     *
     * @var string[]
     */
    public static $list = [
        self::DEVELOP => 'Develop',
        self::ACTIVE => 'Active',
        self::DEPRECATED => 'Deprecated'
    ];
}