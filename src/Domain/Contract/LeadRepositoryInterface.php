<?php

declare(strict_types=1);

namespace App\Domain\Contract;

use App\Domain\Model\Lead;

interface LeadRepositoryInterface
{
    /**
     * Ищет лид по его строковому идентификатору.
     *
     * @param  string  $id
     * @return Lead|null
     */
    public function findLeadById(string $id): ?Lead;
}
