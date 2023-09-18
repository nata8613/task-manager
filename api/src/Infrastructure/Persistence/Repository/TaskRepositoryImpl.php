<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Model\Entity\Task\Task;
use App\Domain\Model\Entity\Task\TaskFilter;
use App\Domain\Model\Entity\Task\TaskNotFoundException;
use App\Domain\Model\Repository\TaskRepository;
use App\Infrastructure\Persistence\Entity\TaskDbo;
use App\Infrastructure\Persistence\Entity\UserDbo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

class TaskRepositoryImpl extends ServiceEntityRepository implements TaskRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskDbo::class);
    }

    /**
     * @param int $id
     *
     * @return Task|null
     *
     * @throws TaskNotFoundException
     */
    public function ofId(int $id): ?Task
    {
        $taskDbo =  $this->findOneBy(['id' => $id]);
        if ($taskDbo === null) {
            throw TaskNotFoundException::ofId($id);
        }

        return $taskDbo->toModel();
    }

    /**
     * @param Task $task
     *
     * @return Task
     */
    public function add(Task $task): Task
    {
        $em = $this->getEntityManager();

        $assignee = $em->getPartialReference(
            UserDbo::class,
            $task->getAssignee()->getIdentity()
        );

        $creator = $em->getPartialReference(
            UserDbo::class,
            $task->getCreator()->getIdentity()
        );

        $dueDate = \DateTime::createFromImmutable($task->getDueDate()->getDate()) ?? null;

        $taskDbo = new TaskDbo(
            $task->getTitle(),
            $task->getDescription(),
            $dueDate,
            $task->getStatus()->getValue() ?? null,
            $task->getPriority(),
            $task->getType()->getValue() ?? null,
            $assignee,
            $creator,
            $task->getLocation(),
            $task->getCategory(),
            $task->getTags(),
            $task->getEstimatedTime(),
            $task->getTimeSpentOnTask(),
            $task->isFollow(),
            $task->isUnread()
        );

        $em->persist($taskDbo);
        $em->flush($taskDbo);

        return $taskDbo->toModel();
    }

    public function edit(Task $task): Task
    {
        $em = $this->getEntityManager();

        /** @var TaskDbo $taskDbo */
        $taskDbo = $this->findOneBy(['id' => $task->getIdentity()]);
        if ($taskDbo === null) {
            throw TaskNotFoundException::ofId($task->getIdentity());
        }

        $assignee = $em->getPartialReference(
            UserDbo::class,
            $task->getAssignee()->getIdentity()
        );

        $dueDate = \DateTime::createFromImmutable($task->getDueDate()->getDate()) ?? null;

        $taskDbo->setTitle($task->getTitle());
        $taskDbo->setDescription($task->getDescription());
        $taskDbo->setDueDate($dueDate);
        $taskDbo->setStatus($task->getStatus()->getValue());
        $taskDbo->setPriority($task->getPriority());
        $taskDbo->setType($task->getType()->getValue());
        $taskDbo->setAssignee($assignee);
        $taskDbo->setLocation($task->getLocation());
        $taskDbo->setCategory($task->getCategory());
        $taskDbo->setTags($task->getTags());
        $taskDbo->setEstimatedTime($task->getEstimatedTime());
        $taskDbo->setTimeSpentOnTask($task->getTimeSpentOnTask());
        $taskDbo->setFollow($task->isFollow());
        $taskDbo->setUnread($task->isUnread());

        $em->flush($taskDbo);

        return $taskDbo->toModel();
    }

    public function remove(int $id): void
    {
        $em = $this->getEntityManager();
        $task = $em->getPartialReference(TaskDbo::class, $id);

        $em->remove($task);
        $em->flush();
    }

    public function list(TaskFilter $filter): array
    {
        $pageSize = $filter->getPageSize();
        $currentPage = $filter->getCurrentPage();

        $query = $this
            ->createQueryBuilder('t')
            ->select('t');

        if ($filter->getUser()) {
            $query
                ->andWhere('t.creator = :user')
                ->setParameter('user', $filter->getUser());
        }

        $paginator = new Paginator($query);

        $maxResult = $pageSize ?? null;
        $firstResult = $pageSize ? ($pageSize * $currentPage) - $pageSize : 0;
        $items = $paginator
            ->getQuery()
            ->setFirstResult($firstResult)
            ->setMaxResults($maxResult)
            ->execute();

        $callback = function(TaskDbo $taskDbo) {
            return $taskDbo->toModel();
        };

        $tasks = array_map($callback, $items);
        $totalItems = $paginator->count();

        return [
            'items' => $tasks,
            'totalItems' => $totalItems,
            'currentPage' => $currentPage ?? 1,
            'pageSize' => $pageSize ? $pageSize : $totalItems
        ];
    }
}
