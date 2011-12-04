<?php

date_default_timezone_set('America/Chicago');
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

set_include_path(
    implode(PATH_SEPARATOR, array(
        get_include_path(),
        dirname(__FILE__)
        )
    )
);

// PSR-0 autoloader
// https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}

spl_autoload_register('autoload');

$db = realpath(dirname(__FILE__) . '/../data/db/bookshelf.db');
$dsn = 'sqlite:' . $db;
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    $dbh = new PDO($dsn, null, null, $options);
} catch (PDOException $e) {
    throw $e;
    echo 'Error!: ' . $e->getMessage();
    die();
}

$bookshelf = new Bookshelf\Service\BookshelfService($dbh);