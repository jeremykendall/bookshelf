<?php
try {
    // in memory sqlite db
    $pdo = new PDO("sqlite::memory:");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("
        CREATE TABLE bookshelf (
        id INTEGER PRIMARY KEY,
        title,
        author
    )"
    );

    // insert data query
    $setup = $pdo->prepare("
    INSERT INTO
        `bookshelf` (`title`, `author`)
    VALUES
        (:title, :author)"
    );
    $setup->bindParam("title", $title);
    $setup->bindParam("author", $author);

    // table data
    $books = array(
        "Clean Code" => "Robert C. Martin",
        "Refactoring" => "Martin Fowler",
        "Test-Driven Development" => "Kent Beck",
        "The Agile Samurai" => "Jonathan Rasmusson",
        "Working Effectively with Legacy Code" => "Michael Feathers"
    );

    // write to DB
    foreach ($books as $title => $author) {
        $setup->execute();
    }
    // end table setup

    $stmt = $pdo->query('SELECT title, author FROM bookshelf ORDER BY title');
    ?>

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
        <?php
    } catch (Exception $e) {
        echo $e->getLine(), ": ", $e->getMessage();
    }

