<?php

namespace App\Domain\Model\Entity\Task;

use App\Domain\Model\Entity\User\User;
use App\Domain\Model\ValueObject\DueDate;
use App\Domain\Model\ValueObject\TaskStatus;
use App\Domain\Model\ValueObject\TaskType;

class Task
{
    private int $identity;

    private string $title;

    private ?string $description;

    private ?DueDate $dueDate;

    private ?TaskStatus $status;

    private ?string $priority;

    private ?TaskType $type;

    private ?User $assignee;

    private User $creator;

    private ?string $location;

    private ?string $category;

    private array $tags = [];

    private ?string $estimatedTime;

    private ?string $timeSpentOnTask;

    private bool $follow;

    private bool $unread;

    /**
     * @param int $identity
     * @param string $title
     * @param string|null $description
     * @param DueDate|null $dueDate
     * @param TaskStatus|null $status
     * @param string|null $priority
     * @param TaskType|null $type
     * @param User|null $assignee
     * @param User $creator
     * @param string|null $location
     * @param string|null $category
     * @param array $tags
     * @param string|null $estimatedTime
     * @param string|null $timeSpentOnTask
     * @param bool $follow
     * @param bool $unread
     */
    public function __construct(
        int $identity,
        string $title,
        ?string $description,
        ?DueDate $dueDate,
        ?TaskStatus $status,
        ?string $priority,
        ?TaskType $type,
        ?User $assignee,
        User $creator,
        ?string $location,
        ?string $category,
        array $tags,
        ?string $estimatedTime,
        ?string $timeSpentOnTask,
        bool $follow,
        bool $unread
    ) {
        $this->identity = $identity;
        $this->title = $title;
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->status = $status;
        $this->priority = $priority;
        $this->type = $type;
        $this->assignee = $assignee;
        $this->creator = $creator;
        $this->location = $location;
        $this->category = $category;
        $this->tags = $tags;
        $this->estimatedTime = $estimatedTime;
        $this->timeSpentOnTask = $timeSpentOnTask;
        $this->follow = $follow;
        $this->unread = $unread;
    }

    public function getIdentity(): int
    {
        return $this->identity;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getDueDate(): ?DueDate
    {
        return $this->dueDate;
    }

    public function getStatus(): ?TaskStatus
    {
        return $this->status;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function getType(): ?TaskType
    {
        return $this->type;
    }

    public function getAssignee(): ?User
    {
        return $this->assignee;
    }

    public function getCreator(): User
    {
        return $this->creator;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getEstimatedTime(): ?string
    {
        return $this->estimatedTime;
    }

    public function getTimeSpentOnTask(): ?string
    {
        return $this->timeSpentOnTask;
    }

    public function isFollow(): bool
    {
        return $this->follow;
    }

    public function isUnread(): bool
    {
        return $this->unread;
    }
}
