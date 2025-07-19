<?php

namespace Liloi\BOYARD\API\Levels\Collection;

use Liloi\BOYARD\Domains\Levels\Manager as LevelsManager;
use Liloi\BOYARD\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $collection = LevelsManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'collection' => $collection
            ])
        ];
    }
}