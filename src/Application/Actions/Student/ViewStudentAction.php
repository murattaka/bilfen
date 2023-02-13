<?php

declare(strict_types=1);

namespace App\Application\Actions\Student;

use Psr\Http\Message\ResponseInterface as Response;

class ViewStudentAction extends StudentAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $studentId = (int) $this->resolveArg('id');
        $student = $this->studentRepository->findStudentOfId($studentId); 
        $this->logger->info("Student of id " . $studentId . " was viewed.");

        return $this->respondWithData($student);
    }
}
