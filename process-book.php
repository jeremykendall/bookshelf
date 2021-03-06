<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once dirname(__FILE__) . '/library/base.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);

    $book = array(
        'id' => $id,
        'title' => $title,
        'author' => $author
    );

    $bookshelf->save($book);
}

header('Location: /');