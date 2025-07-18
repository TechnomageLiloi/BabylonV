<?php

namespace Liloi\TARDIS\API\Maps\Create;

use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domains\Maps\Manager as DiaryManager;

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