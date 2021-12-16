<?php

declare(strict_types=1);

namespace App\Domain\Model;

class InsuranceLead extends Lead
{
    public function getDescription(): string
    {
        return "Заявка на страхование, телефон {$this->getPhone()->getValue()}";
    }
}
