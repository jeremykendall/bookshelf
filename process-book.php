<?php

if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
    header("Location: /");
}

$db = mysql_connect('localhost', 'testuser', 'testpass');
mysql_select_db('bookshelf', $db);

if (empty($_POST['id'])) {
    mysql_query("INSERT INTO bookshelf (title, author) VALUES ('{$_POST['title']}', '{$_POST['author']}')");
} else {
    mysql_query("UPDATE bookshelf SET title = '{$_POST['title']}', author = '{$_POST['author']}' WHERE id = {$_POST['id']}");
}

header("Location: /");
