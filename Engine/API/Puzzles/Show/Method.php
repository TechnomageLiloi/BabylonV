<?php

namespace Liloi\TARDIS\API\Puzzles\Show;

use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domains\Puzzles\Manager as PuzzlesManager;

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