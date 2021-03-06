<?php

declare(strict_types=1);

namespace App\Infrastructure\Gateway;

use App\Applicaton\Contract\BankGatewayInterface;
use App\Applicaton\DTO\SendLeadGatewayRequest;
use App\Applicaton\DTO\SendLeadGatewayResponse;

/**
 * Класс для работы с внешним банковским API.
 */
class BankGateway implements BankGatewayInterface
{
    /**
     * @inheritDoc
     */
    public function sendLead(SendLeadGatewayRequest $request): SendLeadGatewayResponse
    {
        sleep(2);
        $id = random_int(10_000, 99_999);
        if ($id % 10 <= 2) {
            throw new \Exception("При отправке лида возникла ошибка на стороне банка");
        }
        return new SendLeadGatewayResponse((string)$id);
    }
}
