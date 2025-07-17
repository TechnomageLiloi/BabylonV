<?php

namespace Liloi\BabylonV\API\Levels\Collection;

use Liloi\BabylonV\Domains\Levels\Manager as LevelsManager;
use Liloi\BabylonV\API\Method as AbstractMethod;

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