<?php

declare(strict_types=1);

use App\Domain\Student\StudentRepository as StudentRepositoryInterface;
use App\Infrastructure\Persistence\Student\StudentRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our StudentRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        StudentRepositoryInterface::class => \DI\autowire(StudentRepository::class),
    ]);
};
