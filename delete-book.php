<?php

$db = mysql_connect('localhost', 'testuser', 'testpass');
mysql_select_db('bookshelf', $db);

if ($_GET['id']) {
    mysql_query("DELETE FROM bookshelf WHERE id = {$_GET['id']}");
}

header("Location: /");
