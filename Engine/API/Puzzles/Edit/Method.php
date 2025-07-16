<?php

namespace Liloi\BabylonV\API\Puzzles\Edit;

use Liloi\BabylonV\API\Method as SuperMethod;
use Liloi\BabylonV\Domains\Puzzles\Manager as PuzzlesManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = PuzzlesManager::load($_POST['parameters']['key_puzzle']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}