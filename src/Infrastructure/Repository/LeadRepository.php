<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Contract\LeadRepositoryInterface;
use App\Domain\Model\Lead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

class LeadRepository implements LeadRepositoryInterface
{
    public function findLeadById(string $id): ?Lead
    {
        $lead = new Lead(
            new Name("Test"),
            new Phone("9051234567")
        );
        return $lead;
    }
}
