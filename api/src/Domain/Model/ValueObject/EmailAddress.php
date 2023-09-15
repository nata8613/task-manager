<?php

namespace App\Domain\Model\ValueObject;

class EmailAddress
{
    private string $address;

    /**
     * EmailAddress constructor.
     *
     * @param string $address
     *
     * @throws InvalidEmailFormatException
     */
    public function __construct(string $address)
    {
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailFormatException($address);
        }

        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param EmailAddress $other
     *
     * @return bool
     */
    public function equals(EmailAddress $other): bool
    {
        if ($other === null || get_class($this) !== get_class($other)) {
            return false;
        }

        return strcasecmp($this->getAddress(), $other->getAddress()) == 0;
    }
    
    public function __toString(): string
    {
        return $this->address;
    }
}
