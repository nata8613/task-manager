<?php

namespace App\Domain\Model\Entity\Task;

class TaskFilter
{
    private ?int $currentPage;

    private ?int $pageSize;

    private ?int $user;

    public function __construct(
        int $currentPage = null,
        int $pageSize = null,
        int $user = null,
    ) {
        $this->currentPage = $currentPage;
        $this->pageSize = $pageSize;
        $this->user = $user;
    }

    public function getCurrentPage(): ?int
    {
        return $this->currentPage;
    }

    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }
}
