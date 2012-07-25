<?php
$connectionInfo = array('Database' => 'bookshelf', 'UID' => 'testuser', 'PWD' => 'testpass');
$conn = sqlsrv_connect('serverName\instanceName', $connectionInfo);

$stmt = sqlsrv_query($conn, 'SELECT * FROM bookshelf ORDER BY title');
?>
<table>
    <tr>
        <th>Title</th><th>Author</th>
    </tr>
    <?php
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['title']}</td><td>{$row['author']}</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
sqlsrv_close($conn);