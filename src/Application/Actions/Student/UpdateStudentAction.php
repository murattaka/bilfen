<?php

declare(strict_types=1);

namespace App\Application\Actions\Student;

use App\Domain\Student\Student;
use Psr\Http\Message\ResponseInterface as Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UpdateStudentAction extends StudentAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $studentId = (int)$this->resolveArg('id');

        $data = $this->getFormData();
        $data= array_merge(['id'=>$studentId],$data);
        $student = $this->studentRepository->updateStudent($data);

        $this->logger->info("Student of id " . $studentId . " was updated.");

        return $this->respondWithData($student);
    }
}
