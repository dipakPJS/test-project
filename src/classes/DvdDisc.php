<?php

namespace Myapp\Project\classes;

class DvdDisc extends MainProduct
{
    private $sku;
    private $name;
    private $price;
    private $size;

    public function __construct($sku, $name, $price, $size)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }

    // Now using parent class method validateProduct()

    public function validateProduct()
    {
        $sql = 'INSERT INTO products (sku, name, price, size) VALUES (:sku, :name, :price, :size)';
        $stmt = $this->databaseConnection()->prepare($sql);
        $stmt->bindValue('sku', $this->sku);
        $stmt->bindValue('name', $this->name);
        $stmt->bindValue('price', $this->price);
        $stmt->bindValue('size', $this->size);
        $stmt->execute();
    }
}
