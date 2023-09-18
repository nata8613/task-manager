<?php

namespace App\Application\Controller\Request;
class CreateTaskRequest
{
    public string $title;

    public ?string $description;

    public ?string $dueDate;

    public ?string $status;

    public ?string $priority;

    public ?string $type;

    public ?int $assignee;

    public int $creator;

    public ?string $location;

    public ?string $category;

    public ?array $tags = [];

    public ?string $estimatedTime;

    public ?string $timeSpentOnTask;

    public bool $follow;

    public bool $unread;
}