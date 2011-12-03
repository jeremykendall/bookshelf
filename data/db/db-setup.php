<?php

$dbPath = __DIR__ . '/bookshelf.db';

if (file_exists($dbPath)) {
    unlink($dbPath);
}

try {
    $dbh = new PDO('sqlite:' . $dbPath);
} catch (PDOException $e) {
    die('Panic! ' . $e->getMessage());
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh->beginTransaction();

$schema = file_get_contents(__DIR__ . '/../../scripts/bookshelf.schema.sql');
$data = file_get_contents(__DIR__ . '/../../scripts/bookshelf.data.sql');

$dbh->exec($schema);
$dbh->exec($data);

$dbh->commit();