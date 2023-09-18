<?php

namespace App\Application\Service\Task;

use App\Application\Dto\Task\TaskDto;
use App\Domain\Model\Repository\TaskRepository;

class UpdateTaskService
{
    private TaskRepository $taskRepository;

    /**
     * UpdateTaskService constructor.
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return TaskDto
     */
    public function execute($task): TaskDto
    {
        $result = $this->taskRepository->edit($task);

        return new TaskDto($result);
    }
}
