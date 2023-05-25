<?php

use staabm\PHPStanDba\DbSchema\SchemaHasherMysql;
use staabm\PHPStanDba\QueryReflection\RuntimeConfiguration;
use staabm\PHPStanDba\QueryReflection\PdoMysqlQueryReflector;
use staabm\PHPStanDba\QueryReflection\QueryReflection;
use staabm\PHPStanDba\QueryReflection\ReplayAndRecordingQueryReflector;
use staabm\PHPStanDba\QueryReflection\ReflectionCache;

require_once 'vendor/autoload.php';

$cacheFile = '/tmp/.phpstan-dba.cache';

$config = new RuntimeConfiguration();
$config->debugMode(true);
$config->analyzeQueryPlans(true);
$config->utilizeSqlAst(true);

$dsn = sprintf('mysql:host=%s;dbname=%s;port=3306;charset=utf8mb4;', '127.0.0.1', 'tasks');
$pdo = new PDO($dsn, 'root', 'root', []);

QueryReflection::setupReflector(
    new ReplayAndRecordingQueryReflector(
        ReflectionCache::create($cacheFile),
        new PdoMysqlQueryReflector($pdo),
        new SchemaHasherMysql($pdo)
    ),
    $config
);
