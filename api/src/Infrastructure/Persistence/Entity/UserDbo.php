<?php

namespace App\Infrastructure\Persistence\Entity;

use App\Domain\Model\Entity\User\User;
use App\Domain\Model\ValueObject\EmailAddress;
use App\Infrastructure\Persistence\Repository\UserRepositoryImpl;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepositoryImpl::class)]
#[ORM\Table(name: '`user`')]
class UserDbo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private ?string $firstName = null;

    #[ORM\Column]
    private ?string $lastName = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return User
     */
    public function toModel(): User
    {
        return new User(
            $this->id,
            new EmailAddress($this->email) ?? null,
            $this->firstName,
            $this->lastName
        );
    }
}
