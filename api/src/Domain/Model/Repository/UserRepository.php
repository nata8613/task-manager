<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\User\User;

interface UserRepository
{
    /**
     * @param int $id
     *
     * @return User|null
     */
    public function ofId(int $id): ?User;

    /**
     * @return User[]
     */
    public function list(): array;

}
