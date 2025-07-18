<?php

namespace Liloi\TARDIS\API\Levels\Collection;

use Liloi\TARDIS\Domains\Levels\Manager as LevelsManager;
use Liloi\TARDIS\API\Method as AbstractMethod;

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