<?php

namespace App\Infrastructure\Persistence\Entity;

use App\Domain\Model\Entity\Task\Task;
use App\Domain\Model\ValueObject\DueDate;
use App\Domain\Model\ValueObject\TaskStatus;
use App\Domain\Model\ValueObject\TaskType;
use App\Infrastructure\Persistence\Repository\TaskRepositoryImpl;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepositoryImpl::class)]
#[ORM\Table(name: '`task`')]
class TaskDbo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTime $dueDate;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $priority = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $type = null;

    #[ORM\ManyToOne(targetEntity: 'UserDbo')]
    private ?UserDbo $assignee;

    #[ORM\ManyToOne(targetEntity: 'UserDbo')]
    private ?UserDbo $creator;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $location = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $category = null;

    #[ORM\Column]
    private array $tags = [];

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $estimatedTime = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $timeSpentOnTask = null;

    #[ORM\Column]
    private bool $follow = true;

    #[ORM\Column]
    private bool $unread = false;

    /**
     * @param string $title
     * @param string|null $description
     * @param \DateTime $dueDate
     * @param string|null $status
     * @param string|null $priority
     * @param string|null $type
     * @param UserDbo|null $assignee
     * @param UserDbo|null $creator
     * @param string|null $location
     * @param string|null $category
     * @param array $tags
     * @param string|null $estimatedTime
     * @param string|null $timeSpentOnTask
     * @param bool $follow
     * @param bool $unread
     */
    public function __construct(
        string $title,
        ?string $description,
        \DateTime $dueDate,
        ?string $status,
        ?string $priority,
        ?string $type,
        ?UserDbo $assignee,
        ?UserDbo $creator,
        ?string $location,
        ?string $category,
        array $tags,
        ?string $estimatedTime,
        ?string $timeSpentOnTask,
        bool $follow,
        bool $unread
    ) {
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

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(?string $priority): void
    {
        $this->priority = $priority;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getAssignee(): ?UserDbo
    {
        return $this->assignee;
    }

    public function setAssignee(UserDbo $assignee): void
    {
        $this->assignee = $assignee;
    }

    public function getCreator(): ?UserDbo
    {
        return $this->creator;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): void
    {
        $this->category = $category;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function getEstimatedTime(): ?string
    {
        return $this->estimatedTime;
    }

    public function setEstimatedTime(?string $estimatedTime): void
    {
        $this->estimatedTime = $estimatedTime;
    }

    public function getTimeSpentOnTask(): ?string
    {
        return $this->timeSpentOnTask;
    }

    public function setTimeSpentOnTask(?string $timeSpentOnTask): void
    {
        $this->timeSpentOnTask = $timeSpentOnTask;
    }

    public function isFollow(): bool
    {
        return $this->follow;
    }

    public function setFollow(bool $follow): void
    {
        $this->follow = $follow;
    }

    public function isUnread(): bool
    {
        return $this->unread;
    }

    public function setUnread(bool $unread): void
    {
        $this->unread = $unread;
    }

    /**
     * @return Task
     */
    public function toModel(): Task
    {
        return new Task(
            $this->id,
            $this->title,
            $this->description,
            $this->dueDate ? new DueDate(\DateTimeImmutable::createFromMutable($this->getDueDate())) : null,
            $this->status ? new TaskStatus($this->status) : null,
            $this->priority,
            $this->type ? new TaskType($this->type) : null,
            $this->assignee?->toModel(),
            $this->creator?->toModel(),
            $this->location,
            $this->category,
            $this->tags,
            $this->estimatedTime,
            $this->timeSpentOnTask,
            $this->follow,
            $this->unread
        );
    }
}
