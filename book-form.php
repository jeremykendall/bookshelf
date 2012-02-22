<?php

require_once dirname(__FILE__) . '/library/base.php';

$id = empty($_GET['id']) ? null : $_GET['id'];

if ($id) {
    $book = $dbh->query("SELECT title, author FROM bookshelf WHERE id = $id")->fetch();
    $title = $book['title'];
    $author = $book['author'];
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Bookshelf</title>
    </head>
    <body>
        <h1>Bookshelf</h1>

        <p>
            <a href="/">Home</a>
        </p>

        <form method="post" action="process-book.php">

            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />

            <dl>
                <dt>
                    <label for="title">Title</label>
                </dt>
                <dd>
                    <input type="text" id="title" name="title" value="<?php echo $title; ?>" />
                </dd>
                <dt>
                    <label for="author">Author</label>
                </dt>
                <dd>
                    <input type="text" id="author" name="author" value="<?php echo $author; ?>" />
                </dd>
                <dt>&nbsp;</dt>
                <dd>
                    <input type="submit" value="Submit" />
                </dd>
            </dl>
        </form>

    </body>
</html>
