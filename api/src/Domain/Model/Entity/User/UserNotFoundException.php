<?php

namespace App\Domain\Model\Entity\User;
class UserNotFoundException extends \RuntimeException
{
    /**
     * UserNotFoundException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    /**
     * @param int $id
     *
     * @return UserNotFoundException
     */
    public static function ofId(int $id): UserNotFoundException
    {
        $message = sprintf('User with id "%d" does not exists.', $id);

        return new static($message);
    }
}
