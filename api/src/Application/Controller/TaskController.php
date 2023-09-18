<?php

namespace App\Application\Controller;

use App\Application\Controller\Request\CreateTaskRequest;
use App\Application\Dto\Task\TaskDto;
use App\Application\Form\TaskFormType;
use App\Application\Service\Task\CreateTaskService;
use App\Application\Service\Task\GetTaskService;
use App\Application\Service\Task\ListTasksService;
use App\Application\Service\Task\RemoveTaskService;
use App\Application\Service\Task\UpdateTaskService;
use App\Domain\Model\Entity\Task\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    private ListTasksService $listTasksService;

    private GetTaskService $getTaskService;

    private CreateTaskService $createTaskService;

    private UpdateTaskService $updateTaskService;

    private RemoveTaskService $removeTaskService;

    public function __construct(
        ListTasksService $listTasksService,
        GetTaskService $getTaskService,
        CreateTaskService $createTaskService,
        UpdateTaskService $updateTaskService,
        RemoveTaskService $removeTaskService,
    ) {
        $this->listTasksService = $listTasksService;
        $this->getTaskService = $getTaskService;
        $this->createTaskService = $createTaskService;
        $this->updateTaskService = $updateTaskService;
        $this->removeTaskService = $removeTaskService;
    }

    #[Route('/api/v1/tasks', methods: ['GET'])]
    public function listTasks(RequestStack $request): Response
    {
        $tasks = $this->listTasksService->execute($request);

        return $this->json(['data' => $tasks], Response::HTTP_OK);
    }

    #[Route('/api/v1/tasks/{id}', methods: ['GET'])]
    public function getTask(int $id): Response
    {
        $task = $this->getTaskService->execute($id);

        return $this->json(['data' => $task], Response::HTTP_OK);
    }

    #[Route('/api/v1/tasks', methods: ['POST'])]
    public function createTask(Request $request): Response
    {
        $taskRequest = new CreateTaskRequest();
        $form = $this->createForm(TaskFormType::class, $taskRequest);

        $form->submit($request->request->all(), false);
        $task = $this->createTaskService->execute($taskRequest);

        return $this->json(['data' => $task], Response::HTTP_CREATED);
    }

    #[Route('/api/v1/tasks/{id}', methods: ['PUT'])]
    public function updateTask(int $id): Response
    {
        $task = $this->updateTaskService->execute();

        return $this->json(['data' => $task], Response::HTTP_CREATED);
    }

    #[Route('/api/v1/tasks/{id}', methods: ['DELETE'])]
    public function removeTask(int $id): Response
    {
        $this->removeTaskService->execute($id);

        return $this->json([], Response::HTTP_NO_CONTENT);
    }
}
