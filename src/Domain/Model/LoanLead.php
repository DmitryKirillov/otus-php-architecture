<?php

declare(strict_types=1);

namespace App\Domain\Model;

class LoanLead extends Lead
{
    public function getDescription(): string
    {
        return "Заявка на кредит, клиент {$this->getName()->getValue()}";
    }
}
