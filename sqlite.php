<?php
$db = new SQLite3(dirname(__FILE__) . '/data/db/bookshelf.db');
$result = $db->query('SELECT * FROM bookshelf ORDER BY title');
?>
<table>
    <tr>
        <th>Title</th><th>Author</th>
    </tr>
    <?php
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['title']}</td><td>{$row['author']}</td>";
        echo "</tr>";
    }
    ?>
</table>