<?php

namespace App\Application\Service\Task;

use App\Application\Dto\Task\TaskDto;
use App\Domain\Model\Repository\TaskRepository;

class GetTaskService
{
    private TaskRepository $taskRepository;

    /**
     * GetTaskService constructor.
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param int $id
     *
     * @return TaskDto|null
     */
    public function execute(int $id): ?TaskDto
    {
        $result = $this->taskRepository->ofId($id);

        return new TaskDto($result) ?? null;
    }
}
