<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

/**
 * Идентификатор в формате UUID.
 */
class Id
{
    private string $value;

    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        $this->assertValidUuid($value);
        $this->value = $value;
    }

    private function assertValidUuid(string $value): void
    {
        if (mb_strlen($value) !== 36) {
            throw new \InvalidArgumentException("ID должен содержать 36 символов в формате UUID");
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
