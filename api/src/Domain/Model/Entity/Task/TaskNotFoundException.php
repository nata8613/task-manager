<?php

namespace App\Domain\Model\Entity\Task;

class TaskNotFoundException extends \RuntimeException
{
    /**
     * TaskNotFoundException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    /**
     * @param int $id
     *
     * @return TaskNotFoundException
     */
    public static function ofId(int $id): TaskNotFoundException
    {
        $message = sprintf('Task with id "%d" does not exists.', $id);

        return new static($message);
    }
}
