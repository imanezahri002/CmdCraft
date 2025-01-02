<?php

if($_GET['id']){
    require_once 'classes/ProductManager.php';
    $productManager = new ProductManager();
    $productManager->delete($_GET['id']);
    header('Location: /products/index.php');
}