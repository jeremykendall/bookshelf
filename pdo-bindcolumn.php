<?php

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
$stmt->bindColumn('title', $title);
$stmt->bindColumn('author', $author);

?>

<table>
    <tr>
        <th>Title</th><th>Author</th>
    </tr>
    <?php
    while ($stmt->fetch(PDO::FETCH_BOUND)) {
        echo "<tr>";
        echo "<td>$title</td><td>$author</td>";
        echo "</tr>";
    }
    ?>
</table>