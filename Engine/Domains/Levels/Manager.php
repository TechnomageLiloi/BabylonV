<?php

namespace Liloi\BabylonV\Domains\Levels;

use Liloi\BabylonV\Domains\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Gets database table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'levels';
    }

    /**
     * Gets list of levels.
     *
     * @return Collection
     */
    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_level asc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Loads level from database.
     *
     * @param string $key
     * @return Entity
     */
    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_level="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    /**
     * Saves level to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_level'];
        unset($data['key_level']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_level = "%s"', $key)
        );
    }

    /**
     * Creates level default params at database.
     */
    public static function create(): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'title' => 'Enter the title',
            'status' => Statuses::NOT_DEFENDED,
            'program' => '// comment'
        ]);
    }

    public static function getList(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_level, title from %s where status!="%s" order by key_level asc;',
            $name, Statuses::NOT_DEFENDED
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_level']] = $row['title'];
        }

        return $listDefended;
    }

    public static function getListResource(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_level, title from %s where status!="%s" order by key_level asc;',
            $name, Statuses::NOT_DEFENDED
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_level']] = $row['title'];
        }

        return $listDefended;
    }
}