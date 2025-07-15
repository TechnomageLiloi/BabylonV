<?php

namespace Liloi\BabylonV\API\Maps\Edit;

use Liloi\BabylonV\API\Method as SuperMethod;
use Liloi\BabylonV\Domains\Maps\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::load($_POST['parameters']['key_day']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}