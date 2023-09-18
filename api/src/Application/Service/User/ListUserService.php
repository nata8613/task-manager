<?php

namespace App\Application\Service\User;

use App\Application\Dto\User\UserDto;
use App\Domain\Model\Entity\User\User;
use App\Domain\Model\Repository\UserRepository;

class ListUserService
{
    private UserRepository $userRepository;

    /**
     * ListUserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return UserDto[]
     */
    public function execute(): array
    {
        $result = $this->userRepository->list();

        $callback = function (User $user) {
            return new UserDto($user);
        };

        return array_map($callback, $result);
    }
}
