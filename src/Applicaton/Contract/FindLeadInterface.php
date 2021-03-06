<?php

declare(strict_types=1);

namespace App\Applicaton\Contract;

use App\Applicaton\DTO\FindLeadRequest;
use App\Applicaton\DTO\FindLeadResponse;

interface FindLeadInterface
{
    /**
     * Ищет лид по заданным критериям.
     *
     * @param  FindLeadRequest  $findLeadRequest
     * @return FindLeadResponse
     */
    public function findLead(FindLeadRequest $findLeadRequest): FindLeadResponse;
}
