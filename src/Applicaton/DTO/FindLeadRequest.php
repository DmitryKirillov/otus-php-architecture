<?php

declare(strict_types=1);

namespace App\Applicaton\DTO;

class FindLeadRequest
{
    private string $id;

    /**
     * @param  string  $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

}
