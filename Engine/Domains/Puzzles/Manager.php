<?php

namespace Liloi\BabylonV\Domains\Puzzles;

use Liloi\BabylonV\Domains\Manager as DomainManager;
use Liloi\BabylonV\Domains\Maps\Manager as MapsManager;
use Liloi\BabylonV\Exceptions\NotFoundException;

class Manager extends DomainManager
{
    /**
     * Gets database table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'puzzles';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_puzzle desc limit 100;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[$row['key_puzzle']] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Load problem from database.
     *
     * @param string $keyQuest
     * @return Entity
     */
    public static function load(string $keyQuest): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_puzzle="%s"',
            $name, $keyQuest
        ));

        if(empty($row))
        {
            throw new NotFoundException();
        }

        return Entity::create($row);
    }

    /**
     * Load current quest.
     *
     * @return Entity
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s order by key_puzzle desc limit 1', $name
        ));

        return Entity::create($row);
    }

    /**
     * Save problem to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $keyQuest = $data['key_puzzle'];

        self::update(
            $name,
            $data,
            sprintf('key_puzzle = "%s"', $keyQuest)
        );
    }

    /**
     * Create problem in database.
     */
    public static function create(): Entity
    {
        $name = self::getTableName();
        $data = [
            'id' => 'ID-' . date('Y-m-d-H-i-s'),
            'title' => '-',
            'status' => Statuses::DEVELOP,
            'type' => Types::CARD,
            'program' => '{}',
            'theory' => '-',
            'tags' => '-',
            'dt' => date('Y-m-d H:i:s'),
        ];

        self::insert($name, $data);
        return Entity::create($data);
    }
}