<?php

declare(strict_types=1);

namespace App\Domain\Model;

use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;
use App\Domain\ValueObject\Id;

/**
 * Банковский лид.
 */
abstract class Lead
{
    /** @var Id */
    private Id $id;

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
        // todo Генерировать UUID автоматически
        $this->id = new Id("a3746488-db62-4c7f-b562-182f7834b408");
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
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

    /**
     * Возвращает описание лида, специфичное для каждого конкретного потомка.
     *
     * @return string
     */
    abstract public function getDescription(): string;

}
