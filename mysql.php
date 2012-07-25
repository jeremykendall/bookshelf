<?php
$conn = mysql_connect('localhost', 'testuser', 'testpass')
    or die('Could not connect: ' . mysql_error());

mysql_select_db('bookshelf')
    or die('Could not select bookshelf');

$result = mysql_query('SELECT * FROM bookshelf ORDER BY title', $conn)
    or die('Invalid query: ' . mysql_error());
?>
<table>
    <tr>
        <th>Title</th><th>Author</th>
    </tr>
    <?php
    while ($row = mysql_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['title']}</td><td>{$row['author']}</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
mysql_close($conn);