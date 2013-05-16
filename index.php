<?php

error_reporting(-1);
ini_set('display_errors', 1);

$db = mysql_connect('localhost', 'testuser', 'testpass');
mysql_select_db('bookshelf', $db);

$query = "SELECT * FROM bookshelf ORDER BY title";
$result = mysql_query($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Bookshelf</title>
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
        <h1>Bookshelf</h1>

        <p>
            <a href="book-form.php">Add Book</a>
        </p>
        <table>
            <tr>
                <th>Title</th><th>Author</th>
            </tr>
            <?php while ($book = mysql_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <a href="book-form.php?id=<?php echo $book['id']; ?>">
                            <?php echo $book['title']; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $book['author']; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>
