<?php

namespace Liloi\TARDIS\Domains\Config;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * Config entity.
 *
 * @package Liloi\TARDIS\Domains\Config
 */
class Entity extends AbstractEntity
{
    /**
     * Gets `key_config` param.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_config');
    }

    /**
     * @deprecated
     * @return string
     */
    public function getData(): string
    {
        return $this->getField('data');
    }

    /**
     * @deprecated
     * @param string $value
     */
    public function setData(string $value): void
    {
        $this->data['data'] = $value;
    }

    /**
     * Gets data list.
     *
     * @return array
     */
    public function getDataList(): array
    {
        return json_decode($this->getData(), true);
    }

    /**
     * Gets value as string.
     *
     * @return string|null
     */
    public function getString(): ?string
    {
        $data = $this->getDataList();

        if(!array_key_exists('value', $data))
        {
            return null;
        }

        return $data['value'];
    }

    /**
     * Sets value as string.
     *
     * @param string $value
     * @return $this
     */
    public function setString(string $value): self
    {
        $data = $this->getDataList();
        $data['value'] = $value;
        $this->setDataList($data);

        return $this;
    }

    /**
     * Sets data list.
     *
     * @param array $value
     */
    public function setDataList(array $value): void
    {
        $this->setData(json_encode($value, JSON_UNESCAPED_UNICODE));
    }

    /**
     * Save config.
     */
    public function save(): void
    {
        Manager::save($this);
    }
}