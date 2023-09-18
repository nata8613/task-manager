<?php

namespace App\Domain\Model\ValueObject;

class DueDate
{
    private \DateTimeImmutable $date;

    public function __construct(\DateTimeImmutable $date)
    {
        $this->date = $date;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function isOverdue(): bool
    {
        $now = new \DateTimeImmutable('now');
        return $this->date < $now;
    }
}