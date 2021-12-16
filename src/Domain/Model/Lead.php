<?php

declare(strict_types=1);

namespace App\Domain\Model;

use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

abstract class Lead
{
    /** @var Name */
    private Name $name;

    /** @var Phone */
    private Phone $phone;

    /**
     * @param  Name  $name
     * @param  Phone  $phone
     */
    public function __construct(Name $name, Phone $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function getDescription(): string
    {
        if ($this instanceof LoanLead) {
            return "Заявка на кредит, клиент {$this->getName()->getValue()}";
        }
        if ($this instanceof InsuranceLead) {
            return "Заявка на страхование, телефон {$this->getPhone()->getValue()}";
        }
        return '';
    }

}
