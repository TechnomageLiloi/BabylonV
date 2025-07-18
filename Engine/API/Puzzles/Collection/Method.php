<?php

namespace Liloi\TARDIS\API\Puzzles\Collection;

use Liloi\TARDIS\Domains\Puzzles\Manager as PuzzlesManager;
use Liloi\TARDIS\API\Method as AbstractMethod;

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