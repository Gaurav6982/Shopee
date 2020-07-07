<?php

require('database/DBController.php');
//require product class

require('database/Product.php');

require('./database/Cart.php');
//DBCONTROLLER OBJECT
$db=new DBController();

$product=new Product($db);

$cart=new Cart($db);

