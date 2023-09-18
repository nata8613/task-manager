<?php

namespace App\Application\Service\Task;

use App\Application\Dto\Task\TaskDto;
use App\Domain\Model\Entity\Task\Task;
use App\Domain\Model\Entity\Task\TaskFilterBuilder;
use App\Domain\Model\Repository\TaskRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class ListTasksService
{
    private TaskRepository $taskRepository;

    /**
     * ListTasksService constructor.
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /***
     * @return TaskDto[]
     */
    public function execute(RequestStack $request): array
    {
        $taskFilter = (new TaskFilterBuilder())
            ->setCurrentPage($request->getCurrentRequest()->query->get('currentPage') ?? 1)
            ->setPageSize($request->getCurrentRequest()->query->get('pageSize') ?? null)
            ->setUser($request->user ?? null)
            ->build();

        $result = $this->taskRepository->list($taskFilter);

        $callback = function (Task $task) {
            return new TaskDto($task);
        };

        $taskDtos = array_map($callback, $result['tasks'] ?? []);

        return [
            'items' => $taskDtos,
            'totalItems' => $result['totalItems'],
            'currentPage' => $result['currentPage'],
            'pageSize' => $result['pageSize']
        ];
    }
}
