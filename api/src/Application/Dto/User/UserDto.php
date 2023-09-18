<?php

namespace App\Application\Dto\User;

use App\Domain\Model\Entity\User\User;

class UserDto
{
    private int $id;

    private string $email;

    private string $name;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->id = $user->getIdentity();
        $this->email = $user->getEmail()->getAddress();
        $this->name = $user->getName();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }
}