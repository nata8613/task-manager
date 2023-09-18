<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\Task\Task;
use App\Domain\Model\Entity\Task\TaskFilter;
use App\Domain\Model\Entity\Task\TaskNotFoundException;

interface TaskRepository
{
    /**
     * @param int $id
     *
     * @return Task|null
     */
    public function ofId(int $id): ?Task;

    /**
     * @param Task $task
     *
     * @return Task
     */
    public function add(Task $task): Task;

    /**
     * @param Task $task
     *
     * @return Task
     *
     * @throws TaskNotFoundException
     */
    public function edit(Task $task): Task;

    /**
     * @param int $id
     *
     * @return void
     */
    public function remove(int $id): void;

    public function list(TaskFilter $taskFilter): array;

}
