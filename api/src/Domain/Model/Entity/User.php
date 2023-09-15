<?php

namespace App\Domain\Model\Entity;

use App\Domain\Model\ValueObject\EmailAddress;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private int $identity;

    private EmailAddress $email;

    private string $firstName;

    private string $lastName;

    private $roles = [];

    /**
     * @var string The hashed password
     */
    private $password;


    /**
     * User constructor.
     *
     * @param int $identity
     * @param EmailAddress $email
     * @param string $firstName
     * @param string $lastName
     *
     * @return User
     */
    public function __construct(int $identity, EmailAddress $email, string $firstName, string $lastName)
    {
        $this->identity = $identity;
        $this->email = new EmailAddress($email);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getIdentity(): string
    {
        return $this->identity;
    }

    public function getEmail(): ?EmailAddress
    {
        return $this->email;
    }

    public function setEmail(EmailAddress $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getName(): string
    {
        return "$this->firstName $this->lastName";
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email->getAddress();
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}