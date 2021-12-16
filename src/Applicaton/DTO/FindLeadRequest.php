<?php

declare(strict_types=1);

namespace App\Applicaton\DTO;

class FindLeadRequest
{
    private string $id;
    private string $format;

    /**
     * @param  string  $id
     * @param  string  $format
     */
    public function __construct(string $id, string $format)
    {
        $this->id = $id;
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

}
