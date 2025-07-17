<?php

namespace Liloi\BabylonV\Domains\Config;

use Liloi\BabylonV\Domains\Manager as DomainManager;

/**
 * Config manager.
 *
 * @package Liloi\BabylonV\Domains\Config
 */
class Manager extends DomainManager
{
    /**
     * Gets database table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'config';
    }

    /**
     * Loads config from database table.
     *
     * @param string $key
     * @return Entity
     */
    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_config="%s"',
            $name, $key
        ));

        if(!$row)
        {
            $row = [
                'key_config' => $key,
                'data' => '{}'
            ];

            // @todo: repair insert for JSON
            self::getAdapter()->getConnection()->request(
                sprintf("insert into %s(key_config, data) values('%s', '{}')", $name, $key)
            );
        }

        return Entity::create($row);
    }

    /**
     * Saves config to database table.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        $key = $data['key_config'];

        self::update(
            $name,
            $data,
            sprintf('key_config = "%s"', $key)
        );
    }

    /**
     * Creates config tuple.
     *
     * @param $row
     */
    public static function create($row): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, $row);
    }
}