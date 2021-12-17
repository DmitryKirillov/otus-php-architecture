<?php

declare(strict_types=1);

namespace App\Domain\Model;

/**
 * Страховой лид.
 */
class InsuranceLead extends Lead
{
    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return "Заявка на страхование, телефон {$this->getPhone()->getValue()}";
    }
}
