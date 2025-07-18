<?php

namespace Liloi\BOYARD\Domains\Maps;

use Liloi\BOYARD\Domains\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Gets database table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'maps';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_map desc limit 17;',
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
     * Load day by key.
     *
     * @param string $UID
     * @return Entity
     */
    public static function load(string $UID): ?Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_map="%s";',
            $name, $UID
        ));

        if(!$row)
        {
            return null;
//            return self::create($UID);
        }

        return Entity::create($row);
    }

    /**
     * Load current day.
     *
     * @return Entity
     */
    public static function loadCurrent(): ?Entity
    {
        return self::load(self::URLtoUID($_SERVER['REQUEST_URI']));
    }

    /**
     * Save day.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_map']);

        self::update($name, $data, sprintf('key_map="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(string $UID): Entity
    {
        $data = [
            'key_map' => $UID,
            'program' => '-',
            'data' => '{}'
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }

    public static function URLtoUID(string $URL): string
    {
        return ':' . str_replace('/', ':', trim($URL, '/'));
    }

    public static function UIDtoURL(string $UID): string
    {
        return '/' . str_replace(':', '/', trim($UID, ':'));
    }
}