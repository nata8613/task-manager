<?php

namespace App\Domain\Model\ValueObject;

class InvalidEmailFormatException extends \InvalidArgumentException
{
    /**
     * InvalidEmailFormatException constructor.
     *
     * @param string $email
     */
    public function __construct(string $email)
    {
        $message = sprintf('Provided email address "%s" is not valid.', $email);
        parent::__construct($message);
    }
}
