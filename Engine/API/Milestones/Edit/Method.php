<?php

namespace Liloi\BOYARD\API\Milestones\Edit;

use Liloi\BOYARD\API\Method as SuperMethod;
use Liloi\BOYARD\Domains\Milestones\Manager as DiaryManager;

/**
 * Rune API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::load($_POST['parameters']['key_milestone']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}