<?php 
    ob_start();
    include('header.php');
?>
    
<?php
    //Shopping Cart
    count($product->getData('cart'))?include('./templates/_shoping-cart.php'):include('./templates/notFound/_cart_notFound.php');
    //Wishlist
    count($product->getData('wishlist'))?include('./templates/_wishlist.php'):include('./templates/notFound/_wishlist_notFound.php');
    //NEw Phone
    include('./templates/_new-phone.php');
?>
<?php include('footer.php')?>