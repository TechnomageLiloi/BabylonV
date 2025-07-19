<?php

namespace Liloi\BOYARD\API\Milestones\Show;

use Liloi\BOYARD\API\Method as SuperMethod;
use Liloi\BOYARD\Domains\Milestones\Manager as MilestonesManager;
//use Liloi\BOYARD\Domains\Tickets\Manager as TicketsManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = MilestonesManager::loadCurrent();
//        $todos = TicketsManager::loadTodos($entity->getKey());

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
//                'todos' => $todos
            ])
        ];
    }
}