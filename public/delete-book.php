<?php

require_once dirname(__FILE__) . '/../library/base.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $bookshelf->delete($id);
}

header('Location: /');
