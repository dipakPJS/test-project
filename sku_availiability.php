<?php

use Myapp\Project\classes\post;

require_once 'vendor/autoload.php';

$post = new Post();
$sku = $_POST['sku'];

if (isset($sku)) {
    $sql = 'SELECT * FROM products WHERE sku = :sku';
    $stmt = $post->databaseConnection()->prepare($sql);
    $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->rowCount();

    if ($result > 0) {
        echo "<span style = 'color: red'>SKU ID already exists.</span>";
        echo "<script>$('#save').attr('disabled', true);</script>";
        echo "<script>alert('Your sku ID alredy exists please choose another one.');</script>";
    } else {
        echo "<span style = 'color: green'>SKU ID available.</span>";
        echo "<script>$('#save').attr('disabled', false);</script>";
    }
}
