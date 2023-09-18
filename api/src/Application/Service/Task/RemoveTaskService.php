<?php

namespace App\Application\Service\Task;

use App\Domain\Model\Repository\TaskRepository;

class RemoveTaskService
{
    private TaskRepository $taskRepository;

    /**
     * RemoveTaskService constructor.
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
     * @return void
     */
    public function execute(int $id): void
    {
        $this->taskRepository->remove($id);
    }
}
