<?php

namespace Liloi\BabylonV\Domains\Puzzles;

use Liloi\Stylo\Parser as StyloParser;
use Liloi\BabylonV\Domains\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getTheory()
 * @method void setTheory(string $value)
 */
class Entity extends AbstractEntity
{
    private array $program = [];

    public function getKey(): string
    {
        return $this->getField('key_puzzle');
    }

    public function getID(): string
    {
        return $this->getKey();
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getProgramList(): array
    {
        if(empty($this->program))
        {
            $this->program = (array)json_decode($this->getProgram(), true);
        }

        return $this->program;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function parseQuestion(): string
    {
        $program = $this->getProgramList();

        if(!array_key_exists('question', $program))
        {
            return 'No question';
        }

        return $program['question'];
    }

    public function parseAnswer(): string
    {
        $program = $this->getProgramList();

        if(!array_key_exists('answer', $program))
        {
            return 'No answer';
        }

        return $program['answer'];
    }

    public function parseAnswers(): array
    {
        $program = $this->getProgramList();

        if(!array_key_exists('answers', $program))
        {
            return [
                ['answer' => 'true', 'correct' => '1'],
                ['answer' => 'false'],
            ];
        }

        return $program['answers'];
    }

    public function parseSentence(): array
    {
        $program = $this->getProgramList();

        if(!array_key_exists('sentence', $program))
        {
            return [
                'test', '==test',
                'more of equal 5', '>=5',
                'less of equal 10.5', '<=10.5',
                '5 <= x <= 10.5', '><5-10.5',
            ];
        }

        return $program['sentence'];
    }

    public function getVideo(): string
    {
        $program = $this->getProgramList();
        return $program['video'];
    }

    public function render(): string
    {
        return Manager::render(__DIR__ . '/Templates/' . Types::$list[$this->getType()] . '.tpl', [
            'entity' => $this
        ]);
    }
}