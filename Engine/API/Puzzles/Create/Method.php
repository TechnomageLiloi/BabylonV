<?php

namespace Liloi\BabylonV\API\Puzzles\Create;

use Liloi\BabylonV\API\Method as SuperMethod;
use Liloi\BabylonV\Domains\Puzzles\Manager as PuzzlesManager;

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