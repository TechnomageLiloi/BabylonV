<?php

namespace Liloi\BabylonV;

use Liloi\BabylonV\API\Method;
use Liloi\BabylonV\Domains\Manager as DomainsManager;
use Liloi\BabylonV\Exceptions\NotFoundException;
use Liloi\Config\Pool;
use Liloi\Config\Sparkle;
use Rune\Application\General as GeneralApplication;

/**
 * Babylon V Application
 *
 * @package Liloi\BabylonV
 */
class Application extends GeneralApplication
{
    /**
     * Application constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config);

        Pool::getSingleton()->set(new Sparkle('connection', function() use ($config) { return $config['connection'];}));
        Pool::getSingleton()->set(new Sparkle('prefix', function() use ($config) { return $config['prefix'];}));
        Pool::getSingleton()->set(new Sparkle('root', function() use ($config) { return $config['root'];}));
        DomainsManager::setConfig(Pool::getSingleton());
        Method::setConfig($config);
    }

    /**
     * Compiles templates.
     *
     * @return string
     * @throws \Exception
     */
    public function compile(): string
    {
        if(isset($_POST['method']))
        {
            return json_encode(['response' => $this->api($_POST['method'], $_POST['parameters'])]);
        }

        return $this->render(__DIR__ . '/Layout.tpl', [
            'config' => $this->getConfig()
        ]);
    }

    /**
     * Gets response of API method.
     *
     * @param string $name API method name.
     * @param array $parameters API parameters.
     * @return array API
     * @throws \Exception
     */
    public function api(string $name, array $parameters): array
    {
        if(empty($parameters)) {
            $parameters = [];
        }

        if(method_exists($this, $name)) {
            return $this->$name($parameters);
        }

        $classMethod = 'Liloi\\BabylonV\\API\\' . ucfirst(str_replace('.', '\\', $name)) . '\\Method';

        if(class_exists($classMethod))
        {
            $apiMethod = new $classMethod();
            return $apiMethod->execute();
        }

        throw new NotFoundException('No API method.');
    }
}