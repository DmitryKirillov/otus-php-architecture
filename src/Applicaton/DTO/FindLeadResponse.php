<?php

declare(strict_types=1);

namespace App\Applicaton\DTO;

class FindLeadResponse
{
    private string $name;
    private string $phone;
    private string $description;

    /**
     * @param  string  $name
     * @param  string  $phone
     * @param  string  $description
     */
    public function __construct(string $name, string $phone, string $description)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->description = $description;
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

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}

