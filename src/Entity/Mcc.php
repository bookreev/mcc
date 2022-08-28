<?php

namespace Bookreev\Mcc\Entity;

class Mcc
{
    private int $code;
    private Group $group;
    private string $shortDescription;
    private string $fullDescription;


    public function __construct(int $code, Group $group, string $shortDescription, string $fullDescription)
    {
        $this->code = $code;
        $this->group = $group;
        $this->shortDescription = $shortDescription;
        $this->fullDescription = $fullDescription;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getGroup(): Group
    {
        return $this->group;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getFullDescription(): string
    {
        return $this->fullDescription;
    }
}