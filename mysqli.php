<?php
$conn = mysqli_connect('localhost', 'testuser', 'testpass', 'bookshelf')
    or die('Could not connect: ' . mysqli_connect_error());

$result = mysqli_query($conn, 'SELECT * FROM bookshelf ORDER BY title')
    or die('Invalid query: ' . mysqli_error($conn));
?>
<table>
    <tr>
        <th>Title</th><th>Author</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['title']}</td><td>{$row['author']}</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
mysqli_close($conn);