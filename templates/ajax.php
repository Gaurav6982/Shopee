<?php

require('../database/DBController.php');
//require product class

require('../database/Product.php');

//DBCONTROLLER OBJECT
$db=new DBController();

$product=new Product($db);

if(isset($_POST['itemid']))
{
    $result=$product->getProduct($_POST['itemid'],'product');
    echo json_encode($result);
}