<?php

use staabm\PHPStanDba\QueryReflection\RuntimeConfiguration;
use staabm\PHPStanDba\QueryReflection\PdoMysqlQueryReflector;
use staabm\PHPStanDba\QueryReflection\QueryReflection;

require_once 'vendor/autoload.php';

$cacheFile = '/tmp/.phpstan-dba.cache';

$config = new RuntimeConfiguration();
$config->debugMode(true);
$config->analyzeQueryPlans(true);
$config->utilizeSqlAst(true);

$dsn = sprintf('mysql:host=%s;dbname=%s;port=3306;charset=utf8mb4;', '127.0.0.1', 'tasks');
$pdo = new PDO($dsn, 'root', 'root', []);

QueryReflection::setupReflector(
    new PdoMysqlQueryReflector($pdo),
    $config
);
