<?php

require_once dirname(__FILE__) . '/library/base.php';

if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
    header("Location: /");
}

if (empty($_POST['id'])) {
    $dbh->exec("INSERT INTO bookshelf (title, author) VALUES ('{$_POST['title']}', '{$_POST['author']}')");
} else {
    $dbh->exec("UPDATE bookshelf SET title = '{$_POST['title']}', author = '{$_POST['author']}' WHERE id = {$_POST['id']}");
}

header("Location: /");
