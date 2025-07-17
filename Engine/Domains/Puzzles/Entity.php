<?php

namespace Liloi\BabylonV\Domains\Puzzles;

use Liloi\Stylo\Parser as StyloParser;
use Liloi\BabylonV\Domains\Entity as AbstractEntity;

/**
 * Puzzle entity.
 *
 * @method string getId()
 * @method void setId(string $value)
 *
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
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getDt()
 * @method void setDt(string $value)
 */
class Entity extends AbstractEntity
{
    private array $program = [];

    /**
     * Gets `key_puzzle` param.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_puzzle');
    }

    /**
     * Gets title of status.
     *
     * @return string
     */
    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    /**
     * Gets title of type.
     *
     * @return string
     */
    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    /**
     * Save puzzle.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Gets JSON program list as array.
     *
     * @return array
     */
    public function getProgramList(): array
    {
        if(empty($this->program))
        {
            $this->program = (array)json_decode($this->getProgram(), true);
        }

        return $this->program;
    }

    /**
     * Parse question.
     *
     * @return string
     */
    public function parseQuestion(): string
    {
        $program = $this->getProgramList();

        if(!array_key_exists('question', $program))
        {
            return 'No question';
        }

        return $program['question'];
    }

    /**
     * Parse one answer.
     *
     * @return string
     */
    public function parseAnswer(): string
    {
        $program = $this->getProgramList();

        if(!array_key_exists('answer', $program))
        {
            return 'No answer';
        }

        return $program['answer'];
    }

    /**
     * Parse >=1 answers.
     *
     * @return \string[][]
     */
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

    /**
     * Parse sentence.
     *
     * @return string[]
     */
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

    /**
     * Gets video URL.
     *
     * @return string
     */
    public function getVideo(): string
    {
        $program = $this->getProgramList();
        return $program['video'];
    }

    /**
     * Render puzzle.
     *
     * @return string
     */
    public function render(): string
    {
        return Manager::render(__DIR__ . '/Templates/General.tpl', [
            'render' => Manager::render(__DIR__ . '/Templates/' . Types::$list[$this->getType()] . '.tpl', [
                'entity' => $this
            ]),
            'entity' => $this
        ]);
    }

    /**
     * Parse theory with Stylo.
     *
     * @return string
     */
    public function parseTheory(): string
    {
        return StyloParser::parseString($this->getTheory());
    }
}