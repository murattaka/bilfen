<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Student;

use App\Domain\Student\Student;
use App\Domain\Student\StudentRepository as StudentRepositoryInterface;
use App\Domain\Student\StudentNotFoundException;
use PDO;

use function DI\value;

class StudentRepository implements StudentRepositoryInterface
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * {@inheritdoc}
     */
    public function datatables(array $data): array
    {
        $statement = $this->db->prepare("CALL bilfen.list_students(:length,:start,:sortColumn,:sort,:searchValue)");
        $columnIndex = $data['order'][0]['column']; 
        $statement->bindParam('length',$data['length'],PDO::PARAM_INT);
        $statement->bindParam('start',$data['start'],PDO::PARAM_INT);
        $statement->bindParam(':sortColumn',$data['columns'][$columnIndex]['data'],PDO::PARAM_STR);
        $statement->bindParam(':sort',$data['order'][0]['dir'],PDO::PARAM_STR);
        $statement->bindParam(':searchValue',$data['search']['value'],PDO::PARAM_STR);
        $statement->execute();
        $student = $statement->fetchAll();
        
        return $student;
    }

    /**
     * {@inheritdoc}
     */
    public function findStudentOfId(int $id): Student
    {
        $statement = $this->db->prepare("CALL bilfen.show_student(" . $id . ")");
        $statement->execute();
        $student = $statement->fetchObject(Student::class);
        return $student;
    }

    /**
     * {@inheritdoc}
     */
    public function destroyStudentOfId(int $id): bool
    {
        $student = $this->findStudentOfId($id);

        if (is_null($student)) {
            throw new StudentNotFoundException();
        } else {
            $statement = $this->db->prepare("CALL bilfen.delete_student(" . $id . ")");
            $statement->execute();
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function updateStudent(array $student=[]): bool
    {
    
        $statement = $this->db
            ->prepare("CALL update_student(:id,
            :trIdentityNumber,
            :name,
            :surname,
            :school,
            :schoolNumber)"
        );
        $statement->execute($student);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function storeStudent(array $student=[]): int
    {
    
        $statement = $this->db
            ->prepare("CALL store_student(
            :trIdentityNumber,
            :name,
            :surname,
            :school,
            :schoolNumber)"
        );
        $statement->execute($student);
        $lastInsertId = $statement->fetchColumn();
        return $lastInsertId;
    }

    /**
     * {@inheritdoc}
     */
    public function recordsTotal():int
    {
        $statement = $this->db->prepare("CALL total_records()");
        $statement->execute();
        $recordsTotal = $statement->fetchColumn();
        
        return  $recordsTotal;
    }

    /**
     * {@inheritdoc}
     */
    public function recordsFiltered(string $searchValue):int
    {
        $statement = $this->db->prepare("CALL total_records_with_filter('".$searchValue."')");
        $statement->execute();
        $recordsFiltered = $statement->fetchColumn();

        return $recordsFiltered;
    }
}
