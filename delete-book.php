<?php

$db = mysql_connect('localhost', 'testuser', 'testpass');
mysql_select_db('bookshelf', $db);

if ($_GET['id']) {
    mysql_query("INSERT INTO bookshelf (title, author) VALUES ('{$_POST['title']}', '{$_POST['author']}')");
}

header("Location: /");
