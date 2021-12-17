<?php

declare(strict_types=1);

namespace App\Applicaton\Service;

use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\CreateLeadResponse;
use App\Applicaton\DTO\SendLeadGatewayRequest;
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
            $lead = $this->createLead($createLeadRequest);
            $gatewayRequest = $this->createGatewayRequest($lead);
            $gatewayResponse = $this->bankGateway->sendLead($gatewayRequest);
            // todo Добавить ID в лид
            // todo Сохранить лид в БД
            return CreateLeadResponse::createWithId($gatewayResponse->getId());
        } catch (\Exception $e) {
            return CreateLeadResponse::createWithError($e->getMessage());
        }
    }

    /**
     * @param  CreateLeadRequest  $createLeadRequest
     * @return Lead
     */
    private function createLead(CreateLeadRequest $createLeadRequest): Lead
    {
        $lead = new Lead(
            new Name($createLeadRequest->getName()),
            new Phone($createLeadRequest->getPhone())
        );
        return $lead;
    }

    /**
     * @param  Lead  $lead
     * @return SendLeadGatewayRequest
     */
    private function createGatewayRequest(Lead $lead): SendLeadGatewayRequest
    {
        $gatewayRequest = new SendLeadGatewayRequest(
            $lead->getName()->getValue(),
            $lead->getPhone()->getValue(),
        );
        return $gatewayRequest;
    }
}
