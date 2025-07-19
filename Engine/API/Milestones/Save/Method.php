<?php

namespace Liloi\BOYARD\API\Milestones\Save;

use Liloi\BOYARD\API\Method as SuperMethod;
use Liloi\BOYARD\Domains\Milestones\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::load($_POST['parameters']['key_milestone']);

        $entity->setData($_POST['parameters']['data']);
        $entity->setProgram($_POST['parameters']['program']);

        $entity->save();

        return [];
    }
}