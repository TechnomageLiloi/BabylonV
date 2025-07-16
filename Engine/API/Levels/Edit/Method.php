<?php

namespace Liloi\BabylonV\API\Levels\Edit;

use Liloi\BabylonV\Domains\Levels\Manager;
use Liloi\BabylonV\Domains\Levels\Statuses;
use Liloi\BabylonV\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = Manager::load($_POST['parameters']['key']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => Statuses::$list,
            ])
        ];
    }
}