<?php

namespace Bookshelf\Service;

/**
 * Bookshelf app API
 *
 * @category    Bookshelf
 * @package     Bookshelf\Service
 */

/**
 * @category    Bookshelf
 * @package     Bookshelf\Service
 */
class BookshelfService
{

    /**
     * @var PDO database handle
     */
    private $_dbh;

    /**
     * Public constructor
     * 
     * @param PDO $dbh database handle
     */
    public function __construct(\PDO $dbh)
    {
        $this->_dbh = $dbh;
    }

    /**
     * Find book by its id
     *
     * @param  int $id
     * @return array
     */
    public function find($id)
    {
        $sql = 'SELECT * FROM bookshelf WHERE id = :id';
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * Find all books 
     * 
     * @return array
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM bookshelf ORDER BY title';
        return $this->_dbh->query($sql)->fetchAll();
    }

    /**
     * Saves or updates a book.
     * 
     * $options should be an associative array with keys for
     * id, title, and author
     * 
     * @param array $options 
     */
    public function save(array $options)
    {
        if ($options['id']) {
            $sql = 'UPDATE bookshelf SET title = :title, author = :author WHERE id = :id';
            $statement = $this->_dbh->prepare($sql);
            $statement->execute($options);
        } else {
            $sql = 'INSERT INTO bookshelf (title, author) VALUES (:title, :author)';
            $statement = $this->_dbh->prepare($sql);
            unset($options['id']);
            $statement->execute($options);
        }
    }

}
