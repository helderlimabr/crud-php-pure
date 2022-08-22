<?php

namespace FiecCrudPhp\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Dotenv\Dotenv;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $config = (object)parse_ini_file(__DIR__ . '/../../.env');
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;
        $dbParams = [
            'dbname' => $config->DBNAME,
            'user' => $config->USER,
            'password' => $config->PASSWORD,
            'host' => $config->HOST_INSTANCIA,
            'driver' => $config->DRIVER,
        ];

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}
