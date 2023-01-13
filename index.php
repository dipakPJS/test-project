<?php

use Myapp\Project\classes\post;

require_once realpath('vendor/autoload.php'); // including autoloader

require_once 'templates/header.php'; // including header template?>

 <div class="container">
    <form action="post.process.php" method="post"> 
    <nav class="navbar">
      <h1>Product List</h1>

      <div class="btn-section">
  <a href="productAdd.php" class="btn btn-add">ADD</a>
     <button type="submit" id="delete-product-btn" name="delete_product" class="btn btn-delete">MASSDELETE</button>

      </div>
    </nav>
     <div class="product-list-section">
        <div class="main-product-list">

        <!-- php -->
<?php

$getPost = new Post();
$row = $getPost->showPost();
if ($row) {
    foreach ($row as $rows) {
        ?>

     <div class="main-product">
     <input type="checkbox" name="selector[]" class="delete-checkbox" value = <?php echo $rows['id']; ?>>
 
        <p><?php echo $rows['sku']; ?></p>
        <p><?php echo $rows['name']; ?></p>
        <p><?php echo $rows['price']; ?>.00 $</p>


 <?php

 // fetching data with different product types

if ($rows['size'] > 0) {
    echo '<p>Size: '.$rows['size'].' MB </p>'; // fetching for DvdDisc
} elseif ($rows['weight'] > 0) {
    echo '<p>Weight: '.$rows['weight'].' KG </p>'; // fetching for Book
} elseif ($rows['height'] > 0 && $rows['width'] > 0 && $rows['length'] > 0) {
    echo '<p>Dimensions: '.$rows['height'].' x '.$rows['width'].' x '.$rows['length'].'</p>'; // fetching for furniture
} else {
}
        ?>
  
     </div>
     <?php

    }
} else {
    echo '<p class = "empty-post">Post is empty</p>';
}
?>

     

      
        </div>
     </div>
    </form>
     <!-- including banner file -->

 <?php include_once 'templates/footer-banner.php'; ?>
 </div>

 

 <!-- including footer file -->
 
<?php require_once 'templates/footer.php'; ?>

 
 