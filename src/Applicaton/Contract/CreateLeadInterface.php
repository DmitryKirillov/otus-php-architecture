<?php

declare(strict_types=1);

namespace App\Applicaton\Contract;

use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\CreateLeadResponse;

interface CreateLeadInterface
{
    /**
     * Создаёт объект лида и отправляет его в банк.
     * todo Продумать разделение этого метода
     *
     * @param  CreateLeadRequest  $createLeadRequest
     * @return CreateLeadResponse
     */
    public function createAndSendLead(CreateLeadRequest $createLeadRequest): CreateLeadResponse;
}
