<?php

date_default_timezone_set('America/Chicago');
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$db = realpath(dirname(__FILE__) . '/../data/db/bookshelf.db');
$dsn = "sqlite:$db";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    $dbh = new PDO($dsn, null, null, $options);
} catch (PDOException $e) {
    throw $e;
    echo "Error!: " . $e->getMessage() . "<br />\n";
    die();
}
