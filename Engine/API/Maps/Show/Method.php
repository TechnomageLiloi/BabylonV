<?php

namespace Liloi\TARDIS\API\Maps\Show;

use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domains\Maps\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::loadCurrent();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}