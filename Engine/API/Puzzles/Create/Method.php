<?php

namespace Liloi\BOYARD\API\Puzzles\Create;

use Liloi\BOYARD\API\Method as SuperMethod;
use Liloi\BOYARD\Domains\Puzzles\Manager as PuzzlesManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        PuzzlesManager::create();
        return [];
    }
}