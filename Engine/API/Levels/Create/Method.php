<?php

namespace Liloi\BabylonV\API\Levels\Create;

use Liloi\BabylonV\Domains\Levels\Manager;
use Liloi\BabylonV\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        Manager::create();
        return [];
    }
}