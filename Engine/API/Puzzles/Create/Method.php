<?php

namespace Liloi\TARDIS\API\Puzzles\Create;

use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domains\Puzzles\Manager as PuzzlesManager;

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