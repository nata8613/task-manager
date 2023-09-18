<?php

namespace App\Application\Service\Task;

use App\Application\Controller\Request\CreateTaskRequest;
use App\Application\Dto\Task\TaskDto;
use App\Domain\Model\Entity\Task\Task;
use App\Domain\Model\Repository\TaskRepository;
use App\Domain\Model\Repository\UserRepository;

class CreateTaskService
{
    private TaskRepository $taskRepository;

    private UserRepository $userRepository;

    /**
     * CreateTaskService constructor.
     *
     * @param TaskRepository $taskRepository
     * @param UserRepository $userRepository
     */
    public function __construct(TaskRepository $taskRepository, UserRepository $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return TaskDto
     */
    public function execute(CreateTaskRequest $createTaskRequest): TaskDto
    {
        $assignee = isset($createTaskRequest->assignee) ? $this->userRepository->ofId($createTaskRequest?->assignee) : null;
        $creator = isset($createTaskRequest->creator) ? $this->userRepository->ofId($createTaskRequest?->creator) : null;

        $task = new Task(
            0,
            $createTaskRequest->title,
            $createTaskRequest->description,
            $createTaskRequest->dueDate,
            $createTaskRequest->status,
            $createTaskRequest->priority,
            $createTaskRequest->type,
            $assignee,
            $creator,
            $createTaskRequest->location,
            $createTaskRequest->category,
            $createTaskRequest->tags ?? [],
            $createTaskRequest->estimatedTime,
            $createTaskRequest->timeSpentOnTask,
            $createTaskRequest->follow,
            $createTaskRequest->unread
        );
        $result = $this->taskRepository->add($task);

        return new TaskDto($result);
    }
}
