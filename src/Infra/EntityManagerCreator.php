<?php

namespace FiecCrudPhp\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;
        $dbParams = [
            'dbname' => 'CRUD_HELDER',
            'user' => 'sa',
            'password' => 'sto3frou',
            'host' => 'localhost\sqlexpress',
            'driver' => 'sqlsrv',
        ];

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}
