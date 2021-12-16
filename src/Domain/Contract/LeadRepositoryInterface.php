<?php

declare(strict_types=1);

namespace App\Domain\Contract;

use App\Domain\Model\Lead;

interface LeadRepositoryInterface
{
    public function findLeadById(string $id): ?Lead;
}
