<?php

declare(strict_types=1);

namespace App\Application\Actions\Student;

use Psr\Http\Message\ResponseInterface as Response;

class ListStudentsAction extends StudentAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();
        $student = $this->studentRepository->datatables($data);
        $recordsTotal = $this->studentRepository->recordsTotal();
        $recordsFiltered = $this->studentRepository->recordsFiltered($data['search']['value']);

        $this->logger->info("Students list was viewed.");

        $payload=[
            "statusCode"=>200,
            "data"=>$student,
            "recordsTotal"=>$recordsTotal,
            "recordsFiltered"=>$recordsFiltered
        ];
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $this->response->getBody()->write($json);

        return $this->response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus($payload['statusCode']);
    }
}
