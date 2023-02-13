<?php

declare(strict_types=1);

namespace App\Domain\Student;

interface StudentRepository
{
    /**
     * @param array $data
     * @return Student[]
     */
    public function datatables(array $data): array;

    /**
     * @param int $id
     * @return Student
     * @throws StudentNotFoundException
     */
    public function findStudentOfId(int $id): Student;
    
    /**
     * @param int $id
     * @return bool
     * @throws StudentNotFoundException
     */
    public function destroyStudentOfId(int $id): bool;
   
    /**
     * @param Student $student
     * @return bool
     * @throws StudentNotFoundException
     */
    public function updateStudent(array $student): bool;

    /**
     * @param Student $student
     * @return int
     * @throws StudentNotFoundException
     */
    public function storeStudent(array $student): int;

    /**
     * @return int
     * @throws StudentNotFoundException
     */
    public function recordsTotal():int;

    /**
     * @param Student $student
     * @return int
     * @throws StudentNotFoundException
     */
    public function recordsFiltered(string $searchValue): int;
}

