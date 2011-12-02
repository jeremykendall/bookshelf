<?php

require_once dirname(__FILE__) . '/library/base.php';

if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
    header("Location: /");
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);

if ($id) {
    $statement = $dbh->prepare("UPDATE bookshelf SET title = :title, author = :author WHERE id = :id");
    $statement->bindParam(':title', $title);
    $statement->bindParam(':author', $author);
    $statement->bindParam(':id', $id);
    $statement->execute();
} else {
    $statement = $dbh->prepare("INSERT INTO bookshelf (title, author) VALUES (:title, :author)");
    $statement->bindParam(':title', $title);
    $statement->bindParam(':author', $author);
    $statement->execute();
}

header("Location: /");
