<?php

namespace Liloi\TARDIS\API\Puzzles\Edit;

use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domains\Puzzles\Manager as PuzzlesManager;
use Liloi\TARDIS\Domains\Puzzles\Statuses as PuzzlesStatuses;
use Liloi\TARDIS\Domains\Puzzles\Types as PuzzlesTypes;

class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $entity = PuzzlesManager::load($_POST['parameters']['key_puzzle']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => PuzzlesStatuses::$list,
                'types' => PuzzlesTypes::$list,
            ])
        ];
    }
}