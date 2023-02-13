<?php

declare(strict_types=1);

namespace App\Domain\Student;

use JsonSerializable;

class Student implements JsonSerializable
{
    private ?int $id;

    private int $trIdentityNumber;

    private string $name;

    private string $surname;

    private string $school;

    private int $schoolNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrIdentityNumber(): int
    {
        return $this->trIdentityNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getSurame(): string
    {
        return $this->surname;
    }
    public function getSchool(): string
    {
        return $this->school;
    }
    public function getSchoolNumber(): int
    {
        return $this->schoolNumber;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'trIdentityNumber' => $this->trIdentityNumber,
            'name' => $this->name,
            'surname' => $this->surname,
            'school' => $this->school,
            'schoolNumber' => $this->schoolNumber,
        ];
    }
}
