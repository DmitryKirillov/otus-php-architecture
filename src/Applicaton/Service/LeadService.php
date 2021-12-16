<?php

declare(strict_types=1);

namespace App\Applicaton\Service;

use App\Applicaton\Contract\BankGatewayInterface;
use App\Applicaton\Contract\LeadServiceInterface;
use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\CreateLeadResponse;
use App\Applicaton\DTO\FindLeadRequest;
use App\Applicaton\DTO\FindLeadResponse;
use App\Applicaton\DTO\SendLeadGatewayRequest;
use App\Domain\Contract\LeadRepositoryInterface;
use App\Domain\Model\Lead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;
use App\Infrastructure\Gateway\BankGateway;

class LeadService implements LeadServiceInterface
{
    private BankGatewayInterface $bankGateway;
    private LeadRepositoryInterface $leadRepository;

    /**
     * @param  BankGateway  $bankGateway
     * @param  LeadRepositoryInterface  $leadRepository
     */
    public function __construct(
        BankGatewayInterface $bankGateway,
        LeadRepositoryInterface $leadRepository
    ) {
        $this->bankGateway = $bankGateway;
        $this->leadRepository = $leadRepository;
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

    public function findLead(FindLeadRequest $findLeadRequest): FindLeadResponse
    {
        $lead = $this->leadRepository->findLeadById($findLeadRequest->getId());
        // todo Обработка ситуации, когда лид не найден
        return new FindLeadResponse(
            $lead->getName()->getValue(),
            $lead->getPhone()->getValue(),
        );
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
