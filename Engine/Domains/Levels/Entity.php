<?php

namespace Liloi\BOYARD\Domains\Levels;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Level entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getGoal()
 * @method void setGoal(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Gets `key_level` param.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_level');
    }

    /**
     * Save level.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Gets title of status.
     *
     * @return string
     */
    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    /**
     * Gets `HTML` class.
     *
     * @return string
     */
    public function getStatusClass(): string
    {
        return strtolower(str_replace(' ', '-', $this->getStatusTitle()));
    }

    /**
     * Parse program parameter with Stylo.
     *
     * @return string
     */
    public function parseProgram(): string
    {
        return Parser::parseString($this->getProgram());
    }

    /**
     * @deprecated
     * @return string
     */
    public function getProgramParse(): string
    {
        return $this->parseProgram();
    }
}