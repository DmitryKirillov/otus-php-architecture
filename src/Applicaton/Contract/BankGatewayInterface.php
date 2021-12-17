<?php

declare(strict_types=1);

namespace App\Applicaton\Contract;

use App\Applicaton\DTO\SendLeadGatewayRequest;
use App\Applicaton\DTO\SendLeadGatewayResponse;

interface BankGatewayInterface
{
    /**
     * Отправляет лид в банк.
     *
     * @param  SendLeadGatewayRequest  $request
     * @return SendLeadGatewayResponse
     */
    public function sendLead(SendLeadGatewayRequest $request): SendLeadGatewayResponse;
}
