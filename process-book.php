<?php

if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
    header("Location: /");
}

$db = realpath(dirname(__FILE__) . '/data/db/bookshelf.db');
$dsn = "sqlite:$db";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    $dbh = new PDO($dsn, null, null, $options);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />\n";
    die();
}

if (empty($_POST['id'])) {
    $dbh->exec("INSERT INTO bookshelf (title, author) VALUES ('{$_POST['title']}', '{$_POST['author']}')");
} else {
    $dbh->exec("UPDATE bookshelf SET title = '{$_POST['title']}', author = '{$_POST['author']}' WHERE id = {$_POST['id']}");
}

header("Location: /");
