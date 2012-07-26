<?php

//$dsn = 'sqlite:' . realpath(dirname(__FILE__) . '/data/db/bookshelf.db');
//$username = null;
//$password = null;

$dsn = 'mysql:host=localhost;dbname=bookshelf;username=testuser;password=testpass';
$username = 'testuser';
$password = 'testpass';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    $dbh = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Error!: ' . $e->getMessage();
    die();
}

$books = $dbh->query('SELECT * FROM bookshelf ORDER BY title')->fetchAll();

?>
<table>
    <tr>
        <th>Title</th><th>Author</th>
    </tr>
    <?php
    foreach ($books as $row) {
        echo "<tr>";
        echo "<td>{$row['title']}</td><td>{$row['author']}</td>";
        echo "</tr>";
    }
    ?>
</table>