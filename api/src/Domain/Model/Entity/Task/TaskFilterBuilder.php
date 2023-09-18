<?php

namespace App\Domain\Model\Entity\Task;

class TaskFilterBuilder
{
    private ?int $currentPage;

    private ?int $pageSize;

    private ?int $user;

    /**
     * TaskFilterBuilder constructor.
     */
    public function __construct()
    {
    }

    public function setCurrentPage(?int $currentPage): TaskFilterBuilder
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    public function setPageSize(?int $pageSize): TaskFilterBuilder
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    public function setUser(?int $user): TaskFilterBuilder
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return TaskFilter
     */
    public function build(): TaskFilter
    {
        return new TaskFilter(
            $this->currentPage,
            $this->pageSize,
            $this->user,
        );
    }
}
