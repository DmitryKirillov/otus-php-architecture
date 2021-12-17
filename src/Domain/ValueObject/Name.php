<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

class Name
{
    private string $value;

    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        $this->assertValidName($value);
        $this->value = $value;
    }

    private function assertValidName(string $value): void
    {
        if (mb_strlen($value) < 2) {
            throw new \InvalidArgumentException("Имя должно содержать минимум 3 символа");
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

}
