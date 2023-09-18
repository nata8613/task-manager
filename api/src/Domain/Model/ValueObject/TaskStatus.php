<?php

namespace App\Domain\Model\ValueObject;

class TaskStatus
{
    const TASK_STATUS_TODO = 'todo';
    const TASK_STATUS_IN_PROGRESS = 'in_progress';
    const TASK_STATUS_BLOCKED = 'blocked';
    const TASK_STATUS_REVIEW = 'review';
    const TASK_STATUS_COMPLETED = 'completed';
    const TASK_STATUS_CANCELED = 'canceled';

    private string $value;

    /**
     * TaskStatus constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if ($value !== TaskStatus::TASK_STATUS_TODO &&
            $value !== TaskStatus::TASK_STATUS_IN_PROGRESS &&
            $value !== TaskStatus::TASK_STATUS_BLOCKED &&
            $value !== TaskStatus::TASK_STATUS_REVIEW &&
            $value !== TaskStatus::TASK_STATUS_COMPLETED &&
            $value !== TaskStatus::TASK_STATUS_CANCELED
        ) {
            $message = sprintf('Task status "%s" is not valid.', $value);
            throw new \InvalidArgumentException($message);
        }

        $this->value = $value;
    }

    /**
     * @return TaskStatus
     */
    public static function todo(): TaskStatus
    {
        return new static(static::TASK_STATUS_TODO);
    }

    /**
     * @return TaskStatus
     */
    public static function inProgress(): TaskStatus
    {
        return new static(static::TASK_STATUS_IN_PROGRESS);
    }

    /**
     * @return TaskStatus
     */
    public static function blocked(): TaskStatus
    {
        return new static(static::TASK_STATUS_BLOCKED);
    }

    /**
     * @return TaskStatus
     */
    public static function review(): TaskStatus
    {
        return new static(static::TASK_STATUS_REVIEW);
    }

    /**
     * @return TaskStatus
     */
    public static function completed(): TaskStatus
    {
        return new static(static::TASK_STATUS_COMPLETED);
    }

    /**
     * @return TaskStatus
     */
    public static function canceled(): TaskStatus
    {
        return new static(static::TASK_STATUS_CANCELED);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param TaskStatus $other
     *
     * @return bool
     */
    public function equals(TaskStatus $other): bool
    {
        if ($other === null || get_class($this) !== get_class($other)) {
            return false;
        }

        return $this->getValue() === $other->getValue();
    }

    /**
     * @return string
     */
    public function getReadableValue(): string
    {
        switch ($this->value) {
            case TaskStatus::TASK_STATUS_TODO: return 'To-Do';
            case TaskStatus::TASK_STATUS_IN_PROGRESS: return 'In Progress';
            case TaskStatus::TASK_STATUS_BLOCKED: return 'Blocked';
            case TaskStatus::TASK_STATUS_REVIEW: return 'Review';
            case TaskStatus::TASK_STATUS_COMPLETED: return 'Completed';
            case TaskStatus::TASK_STATUS_CANCELED: return 'Canceled';
            default: return $this->value;
        }
    }
}
