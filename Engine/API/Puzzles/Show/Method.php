<?php

namespace Liloi\BOYARD\API\Puzzles\Show;

use Liloi\BOYARD\API\Method as SuperMethod;
use Liloi\BOYARD\Domains\Puzzles\Manager as PuzzlesManager;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $puzzle = PuzzlesManager::load($_POST['parameters']['key_puzzle']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $puzzle
            ])
        ];
    }
}