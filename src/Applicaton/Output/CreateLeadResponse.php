<?php

declare(strict_types=1);

namespace App\Applicaton\Output;

class CreateLeadResponse
{
    private ?string $id = null;
    private ?string $error = null;

    private function __construct()
    {
    }

    public static function createWithId(string $id): self
    {
        $object = new self();
        $object->id = $id;
        return $object;
    }

    public static function createWithError(string $error): self
    {
        $object = new self();
        $object->error = $error;
        return $object;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

}
