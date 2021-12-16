<?php

declare(strict_types=1);

namespace App\Applicaton\Contract;

use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\CreateLeadResponse;

interface CreateLeadInterface
{
    public function createAndSendLead(CreateLeadRequest $createLeadRequest): CreateLeadResponse;
}
