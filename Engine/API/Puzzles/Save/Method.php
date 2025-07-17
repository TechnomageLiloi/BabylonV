<?php

namespace Liloi\BabylonV\API\Puzzles\Save;

use Liloi\BabylonV\API\Method as SuperMethod;
use Liloi\BabylonV\Domains\Puzzles\Manager as PuzzlesManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $puzzle = PuzzlesManager::load($_POST['parameters']['key_puzzle']);

        $puzzle->setId($_POST['parameters']['id']);
        $puzzle->setTitle($_POST['parameters']['title']);
        $puzzle->setProgram($_POST['parameters']['program']);
        $puzzle->setStatus($_POST['parameters']['status']);
        $puzzle->setType($_POST['parameters']['type']);
        $puzzle->setTheory($_POST['parameters']['theory']);
        $puzzle->setTags($_POST['parameters']['tags']);

        $puzzle->save();

        return [];
    }
}