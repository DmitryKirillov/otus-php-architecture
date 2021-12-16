<?php

declare(strict_types=1);

namespace App\Applicaton\Contract;

use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\CreateLeadResponse;
use App\Applicaton\DTO\FindLeadRequest;
use App\Applicaton\DTO\FindLeadResponse;

interface LeadServiceInterface
{
    public function createAndSendLead(CreateLeadRequest $createLeadRequest): CreateLeadResponse;

    public function findLead(FindLeadRequest $findLeadRequest): FindLeadResponse;
}
