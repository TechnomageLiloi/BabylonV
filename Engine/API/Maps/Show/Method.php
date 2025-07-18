<?php

namespace Liloi\BOYARD\API\Maps\Show;

use Liloi\BOYARD\API\Method as SuperMethod;
use Liloi\BOYARD\Domains\Maps\Manager as DiaryManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $entity = DiaryManager::loadCurrent();

        if($entity === null)
        {
            return [
                'render' => $this->render(__DIR__ . '/Create.tpl')
            ];
        }

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}