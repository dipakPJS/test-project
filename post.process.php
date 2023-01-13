<?php

use Myapp\Project\classes\Book;
use Myapp\Project\classes\DvdDisc;
use Myapp\Project\classes\Furniture;
use Myapp\Project\classes\post;

require_once 'vendor/autoload.php';

$post = new Post();

// mass-delete php code

if (isset($_POST['delete_product'])) {
    if (isset($_POST['selector'])) {
        foreach ($_POST['selector'] as $selector) {
            $post->deleteProduct($selector);
        }
    }

    header('location: index.php');
}

// inserting data based on different product types

if (isset($_POST['save_product'])) {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];

    // validating book

    if (!empty($sku) && !empty($name) && !empty($price) && !empty($weight)) {
        $book = new Book($sku, $name, $price, $weight);
        $book->validateProduct();
        header('location: index.php');
    }

    // validating DvdDisc

    elseif (!empty($sku) && !empty($name) && !empty($price) && !empty($size)) {
        $dvdDisc = new DvdDisc($sku, $name, $price, $size);
        $dvdDisc->validateProduct();
        header('location: index.php');
    }

    // validating furniture

    elseif (!empty($sku) && !empty($name) && !empty($price) && !empty($height) && !empty($width) && !empty($length)) {
        $furniture = new Furniture($sku, $name, $price, $height, $width, $length);
        $furniture->validateProduct();
        header('location: index.php');
    } else {
        return false;
    }
}
