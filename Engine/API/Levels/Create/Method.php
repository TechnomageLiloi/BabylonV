<?php

namespace Liloi\TARDIS\API\Levels\Create;

use Liloi\TARDIS\Domains\Levels\Manager;
use Liloi\TARDIS\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        Manager::create();
        return [];
    }
}