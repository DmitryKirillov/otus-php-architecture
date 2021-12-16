<?php

declare(strict_types=1);

namespace App\Infrastructure\Gateway;

use App\Domain\Model\Lead;

class BankGateway
{
    public function sendLead(Lead $lead): string
    {
        sleep(3);
        $id = random_int(10_000, 99_999);
        if ($id % 1_000 < 3) {
            throw new \Exception("При отправке лида возникла ошибка");
        }
        return (string)$id;
    }
}
