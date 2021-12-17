<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Contract\LeadRepositoryInterface;
use App\Domain\Model\InsuranceLead;
use App\Domain\Model\Lead;
use App\Domain\Model\LoanLead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

/**
 * Репозиторий лидов.
 */
class LeadRepository implements LeadRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findLeadById(string $id): ?Lead
    {
        $name = new Name("Test");
        $phone = new Phone("9051234567");
        $idLength = mb_strlen($id);
        if ($idLength % 2 === 1) {
            $lead = new LoanLead($name, $phone);
        } else {
            $lead = new InsuranceLead($name, $phone);
        }
        return $lead;
    }
}
