<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Model\Entity\User;
use App\Domain\Model\Repository\UserRepository;
use App\Infrastructure\Persistence\Entity\UserDbo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepositoryImpl extends ServiceEntityRepository implements UserRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserDbo::class);
    }

    /**
     * @return User[]
     */
    public function list(): array
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u');

        $result = $qb->getQuery()->execute();

        $callback = function (UserDbo $userDbo) {
            return $userDbo->toModel();
        };

        return array_map($callback, $result);
    }
}
