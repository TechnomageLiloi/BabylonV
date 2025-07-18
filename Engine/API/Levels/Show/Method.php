<?php

namespace Liloi\TARDIS\API\Levels\Show;

use Liloi\TARDIS\Domains\Levels\Manager;
use Liloi\TARDIS\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $entity = Manager::load($_POST['parameters']['key']);
        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}