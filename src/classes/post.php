<?php

namespace Myapp\Project\classes;

class Post extends Connect
{
    // showPost() method for fetching data from database

    public function showPost()
    {
        $sql = 'SELECT * FROM products';
        $stmt = $this->databaseConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    // deleteProduct() method for deleting the data from database

    public function deleteProduct($selector)
    {
        $sql = 'DELETE FROM products WHERE id = :id';
        $stmt = $this->databaseConnection()->prepare($sql);
        $stmt->bindValue('id', $selector);
        $stmt->execute();
    }
}
