<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Input;

class CreateLeadRequest
{
    private string $name;
    private string $phone;

    /**
     * @param  string  $name
     * @param  string  $phone
     */
    public function __construct(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }


}
