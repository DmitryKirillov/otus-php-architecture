<?php

declare(strict_types=1);

namespace App\Applicaton\Service;

use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\CreateLeadResponse;
use App\Domain\Model\Lead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;
use App\Infrastructure\Gateway\BankGateway;

class LeadService
{
    private BankGateway $bankGateway;

    /**
     * @param  BankGateway  $bankGateway
     */
    public function __construct(BankGateway $bankGateway)
    {
        $this->bankGateway = $bankGateway;
    }

    public function createAndSendLead(CreateLeadRequest $createLeadRequest): CreateLeadResponse
    {
        try {
            $lead = new Lead(
                new Name($createLeadRequest->getName()),
                new Phone($createLeadRequest->getPhone())
            );
            $id = $this->bankGateway->sendLead($lead);
            return CreateLeadResponse::createWithId($id);
        } catch (\Exception $e) {
            return CreateLeadResponse::createWithError($e->getMessage());
        }
    }
}
