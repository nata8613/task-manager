<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Entity\User;

interface UserRepository
{

    /**
     * @return User[]
     */
    public function list(): array;

}
