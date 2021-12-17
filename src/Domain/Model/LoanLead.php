<?php

declare(strict_types=1);

namespace App\Domain\Model;

/**
 * Кредитный лид.
 */
class LoanLead extends Lead
{
    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        $name = $this->getName()->getValue();
        $nameLength = mb_strlen($name);
        $nameDigitsLength = mb_strlen(
            preg_replace('/\D/', '', $name)
        );
        $average = $nameDigitsLength !== 0 ? $nameLength / $nameDigitsLength : 0;
        return "Заявка на кредит, клиент $name, средняя длина $average";
    }
}
