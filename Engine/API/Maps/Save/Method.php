<?php

namespace Liloi\TARDIS\API\Maps\Save;

use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domains\Maps\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::load($_POST['parameters']['key_day']);

        $entity->setData($_POST['parameters']['data']);
        $entity->setProgram($_POST['parameters']['program']);

        $entity->save();

        return [];
    }
}