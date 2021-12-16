<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Contract\LeadRepositoryInterface;
use App\Domain\Model\InsuranceLead;
use App\Domain\Model\Lead;
use App\Domain\Model\LoanLead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

class LeadRepository implements LeadRepositoryInterface
{
    public function findLeadById(string $id): ?Lead
    {
        $name = new Name("Test");
        $phone = new Phone("9051234567");
        if (((int)$id) % 2) {
            $lead = new LoanLead($name, $phone);
        } else {
            $lead = new InsuranceLead($name, $phone);
        }
        return $lead;
    }
}
