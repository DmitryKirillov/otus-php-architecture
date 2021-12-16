<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Output;

class CreateLeadResponse
{
    private string $id;
    private string $error;

    /**
     * @param  string  $id
     * @param  string  $error
     */
    public function __construct(string $id, string $error)
    {
        $this->id = $id;
        $this->error = $error;
    }

}
