<?php

namespace Liloi\BabylonV\API\Puzzles\Collection;

use Liloi\BabylonV\Domains\Puzzles\Manager as PuzzlesManager;
use Liloi\BabylonV\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $collection = PuzzlesManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'collection' => $collection
            ])
        ];
    }
}