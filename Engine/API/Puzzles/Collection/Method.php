<?php

namespace Liloi\BOYARD\API\Puzzles\Collection;

use Liloi\BOYARD\Domains\Puzzles\Manager as PuzzlesManager;
use Liloi\BOYARD\API\Method as AbstractMethod;

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