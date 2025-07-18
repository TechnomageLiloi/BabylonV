<?php

namespace Liloi\TARDIS\API;

abstract class Method
{
    private static array $config;

    public function render(string $template, array $data = []): string
    {
        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    public static function getConfig(): array
    {
        return self::$config;
    }

    public static function setConfig(array $config): void
    {
        self::$config = $config;
    }

    /**
     * Executes API method.
     *
     * @return array
     */
    abstract public function execute(): array;
}