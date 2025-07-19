<?php

namespace Liloi\BOYARD\API\Maps\Create;

use Liloi\BOYARD\API\Method as SuperMethod;
use Liloi\BOYARD\Domains\Maps\Manager as DiaryManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        DiaryManager::create(
            DiaryManager::URLtoUID($_SERVER['REQUEST_URI'])
        );

        return [];
    }
}