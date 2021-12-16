<?php

declare(strict_types=1);

namespace App\Infrastructure\Gateway;

use App\Applicaton\DTO\SendLeadGatewayRequest;
use App\Applicaton\DTO\SendLeadGatewayResponse;

interface BankGatewayInterface
{
    public function sendLead(SendLeadGatewayRequest $request): SendLeadGatewayResponse;
}
