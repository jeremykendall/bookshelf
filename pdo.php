<?php

//$dsn = 'sqlite:' . realpath(dirname(__FILE__) . '/data/db/bookshelf.db');
//$username = null;
//$password = null;

$dsn = 'mysql:host=localhost;dbname=bookshelf';
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

$stmt = $dbh->query('SELECT id, title, author FROM bookshelf ORDER BY title');
$count = $stmt->rowCount();

?>
<p>There are <?php echo $count; ?> books in the database.</p>
<table>
    <tr>
        <th>Title</th><th>Author</th>
    </tr>
    <?php
    foreach ($stmt as $row) {
        echo "<tr>";
        echo "<td>{$row['title']}</td><td>{$row['author']}</td>";
        echo "</tr>";
    }
    ?>
</table>