<?php

namespace Liloi\BabylonV\API\Puzzles\Collection;

use Liloi\BabylonV\Domains\Puzzles\Manager as PuzzlesManager;
use Liloi\BabylonV\API\Method as AbstractMethod;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends AbstractMethod
{
    public function execute(): array
    {
        $collection = PuzzlesManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'collection' => $collection
            ])
        ];
    }
}