<?php 
ob_start();
include('header.php')?>

<?php
    // Banner Area
        include('./templates/_banner-area.php');
    //Banner Area End

    // Top Sale Section
    include('./templates/_topSale.php');
    //Top Sale Section End

    // Special Price Section
    include('./templates/_special-price.php');
    //Special Price Section End

    // Special Price Section
    include('./templates/_banner-ads.php');
    //Special Price Section End

     // New Phone Section
     include('./templates/_new-phone.php');
     //New Phone Section End
?>

<?php include('footer.php')?>