<?php

namespace Liloi\BabylonV\Domains\Logs;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Log entity.
 *
 * @method string getTs()
 * @method void setTs(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Gets `key_log` param.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_log');
    }

    /**
     * Save log to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }
}