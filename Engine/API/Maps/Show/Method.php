<?php

namespace Liloi\BabylonV\API\Maps\Show;

use Liloi\BabylonV\API\Method as SuperMethod;
use Liloi\BabylonV\Domains\Maps\Manager as DiaryManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
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