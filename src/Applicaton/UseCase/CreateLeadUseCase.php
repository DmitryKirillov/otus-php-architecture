<?php

declare(strict_types=1);

namespace App\Applicaton\UseCase;

use App\Applicaton\Contract\BankGatewayInterface;
use App\Applicaton\Contract\CreateLeadInterface;
use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\CreateLeadResponse;
use App\Applicaton\DTO\SendLeadGatewayRequest;
use App\Domain\Model\Lead;
use App\Domain\Model\LoanLead;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

/**
 * Use Case: создание лида и его отправка в банк.
 */
class CreateLeadUseCase implements CreateLeadInterface
{
    /** @var BankGatewayInterface */
    private BankGatewayInterface $bankGateway;

    /**
     * @param  BankGatewayInterface  $bankGateway
     */
    public function __construct(BankGatewayInterface $bankGateway)
    {
        $this->bankGateway = $bankGateway;
    }

    /**
     * @inheritDoc
     */
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
        $lead = new LoanLead(
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
