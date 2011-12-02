<?php
require_once dirname(__FILE__) . '/library/base.php';
$books = $bookshelf->findAll();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>#memtech Bookshelf</title>
        <style type="text/css">
            table {
                border: 1px solid black;
                border-collapse: collapse;
                width: 600px;
            }
            th {
                background-color: #E9E9E9;
            }
            td {
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <h1>#memtech Bookshelf</h1>

        <p>
            <a href="book-form.php">Add Book</a>
        </p>

        <?php if (count($books) > 0): ?>
            <table>
                <tr>
                    <th>Title</th><th>Author</th>
                </tr>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td>
                        <a href="book-form.php?id=<?php echo $book['id']; ?>">
                        <?php echo htmlspecialchars($book['title'], ENT_COMPAT, 'UTF-8'); ?>
                    </a>
                </td>
                <td>
                    <?php echo htmlspecialchars($book['author'], ENT_COMPAT, 'UTF-8'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
                    </table>
        <?php else: ?>
                            <p>We have no books!</p>
        <?php endif; ?>
    </body>
</html>