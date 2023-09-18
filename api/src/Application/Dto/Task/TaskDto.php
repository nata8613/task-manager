<?php

namespace App\Application\Dto\Task;

use App\Application\Dto\User\UserDto;
use App\Domain\Model\Entity\Task\Task;

class TaskDto
{
    private int $id;

    private string $title;

    private ?string $description;

    private ?string $dueDate;

    private ?string $status;

    private ?string $priority;

    private ?string $type;

    private ?UserDto $assignee;

    private UserDto $creator;

    private ?string $location;

    private ?string $category;

    private array $tags = [];

    private ?string $estimatedTime;

    private ?string $timeSpentOnTask;

    private bool $follow;

    private bool $unread;

    /**
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->id = $task->getIdentity();
        $this->title = $task->getTitle();
        $this->description = $task->getDescription();
        $this->dueDate = $task->getDueDate()?->getDate();
        $this->status = $task->getStatus()?->getValue();
        $this->priority = $task->getPriority();
        $this->type = $task->getType()?->getValue();
        $this->assignee = $task->getAssignee() ? new UserDto($task->getAssignee()) : null;
        $this->creator = $task->getCreator() ? new UserDto($task?->getCreator()) : null;
        $this->location = $task->getLocation();
        $this->category = $task->getCategory();
        $this->tags = $task->getTags();
        $this->estimatedTime = $task->getEstimatedTime();
        $this->timeSpentOnTask = $task->getTimeSpentOnTask();
        $this->follow = $task->isFollow();
        $this->unread = $task->isUnread();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getAssignee(): ?UserDto
    {
        return $this->assignee;
    }

    public function getCreator(): UserDto
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

    public function fromModel(Task $task): TaskDto
    {

    }
}