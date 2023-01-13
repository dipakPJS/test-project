<?php

namespace Myapp\Project\classes;

class Furniture extends MainProduct
{
    private $sku;
    private $name;
    private $price;
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $height, $width, $length)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    // Now using parent class method validateProduct()

    public function validateProduct()
    {
        $sql = 'INSERT INTO products (sku, name, price, height, width, length) VALUES (:sku, :name, :price, :height, :width, :length)';
        $stmt = $this->databaseConnection()->prepare($sql);
        $stmt->bindValue('sku', $this->sku);
        $stmt->bindValue('name', $this->name);
        $stmt->bindValue('price', $this->price);
        $stmt->bindValue('height', $this->height);
        $stmt->bindValue('width', $this->width);
        $stmt->bindValue('length', $this->length);
        $stmt->execute();
    }
}
