<?php

namespace App\Domain\Model\ValueObject;

class TaskType
{
    const TASK_TYPE_STORY = 'story';
    const TASK_TYPE_TASK = 'task';
    const TASK_TYPE_SPIKE = 'spike';
    const TASK_TYPE_BUG = 'bug';
    const TASK_TYPE_DESIGN = 'design';
    const TASK_TYPE_IMPROVEMENT = 'improvement';
    const TASK_TYPE_MAINTENANCE = 'maintenance';
    const TASK_TYPE_RESEARCH = 'research';
    const TASK_TYPE_DOCUMENTATION = 'documentation';

    private string $value;

    /**
     * TaskType constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if ($value !== TaskType::TASK_TYPE_STORY &&
            $value !== TaskType::TASK_TYPE_TASK &&
            $value !== TaskType::TASK_TYPE_SPIKE &&
            $value !== TaskType::TASK_TYPE_BUG &&
            $value !== TaskType::TASK_TYPE_DESIGN &&
            $value !== TaskType::TASK_TYPE_IMPROVEMENT &&
            $value !== TaskType::TASK_TYPE_MAINTENANCE &&
            $value !== TaskType::TASK_TYPE_RESEARCH &&
            $value !== TaskType::TASK_TYPE_DOCUMENTATION
        ) {
            $message = sprintf('Task type "%s" is not valid.', $value);
            throw new \InvalidArgumentException($message);
        }

        $this->value = $value;
    }

    /**
     * @return TaskType
     */
    public static function story(): TaskType
    {
        return new static(static::TASK_TYPE_STORY);
    }

    /**
     * @return TaskType
     */
    public static function task(): TaskType
    {
        return new static(static::TASK_TYPE_TASK);
    }

    /**
     * @return TaskType
     */
    public static function spike(): TaskType
    {
        return new static(static::TASK_TYPE_SPIKE);
    }

    /**
     * @return TaskType
     */
    public static function bug(): TaskType
    {
        return new static(static::TASK_TYPE_BUG);
    }

    /**
     * @return TaskType
     */
    public static function design(): TaskType
    {
        return new static(static::TASK_TYPE_DESIGN);
    }

    /**
     * @return TaskType
     */
    public static function improvement(): TaskType
    {
        return new static(static::TASK_TYPE_IMPROVEMENT);
    }

    /**
     * @return TaskType
     */
    public static function maintenance(): TaskType
    {
        return new static(static::TASK_TYPE_MAINTENANCE);
    }

    /**
     * @return TaskType
     */
    public static function research(): TaskType
    {
        return new static(static::TASK_TYPE_RESEARCH);
    }

    /**
     * @return TaskType
     */
    public static function documentation(): TaskType
    {
        return new static(static::TASK_TYPE_DOCUMENTATION);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getReadableValue(): string
    {
        switch ($this->value) {
            case TaskType::TASK_TYPE_STORY: return 'Story';
            case TaskType::TASK_TYPE_TASK: return 'Task';
            case TaskType::TASK_TYPE_SPIKE: return 'Spike';
            case TaskType::TASK_TYPE_BUG: return 'Bug Fix';
            case TaskType::TASK_TYPE_DESIGN: return 'Design';
            case TaskType::TASK_TYPE_IMPROVEMENT: return 'Improvement';
            case TaskType::TASK_TYPE_MAINTENANCE: return 'Maintenance';
            case TaskType::TASK_TYPE_RESEARCH: return 'Research';
            case TaskType::TASK_TYPE_DOCUMENTATION: return 'Documentation';

            default: return $this->value;
        }
    }

    /**
     * @param TaskType $other
     *
     * @return bool
     */
    public function equals(TaskType $other): bool
    {
        if ($other === null || get_class($this) !== get_class($other)) {
            return false;
        }

        return $this->getValue() === $other->getValue();
    }
}
