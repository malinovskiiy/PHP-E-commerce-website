<?php
    // Require database connection
    require './database/DBController.php';

    require './database/Product.php';
    require './database/Cart.php';
    require './database/Wishlist.php';

    // Database controller object
    $db = new DBController();

    // Product object
    $product = new Product($db);
    $product_array = $product->getDataFromTable();

    // Cart object
    $Cart = new Cart($db);    

    // Wishlist object
    $Wishlist = new Wishlist($db);