<?php

declare(strict_types=1);

namespace App\Application\Actions\Student;

use App\Domain\Student\Student;
use Psr\Http\Message\ResponseInterface as Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class StoreStudentAction extends StudentAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();
        $student = $this->studentRepository->storeStudent($data);

        $this->logger->info("Student of id " . $student . " was created.");

        return $this->respondWithData($student);
    }
}
