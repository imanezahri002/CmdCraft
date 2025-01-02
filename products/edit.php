<?php
require_once 'classes/ProductManager.php';
$productManager = new ProductManager();
$product = $productManager->getProduct($_GET['id']);

if($_POST['btnSubmit'])
{
    $product->setName($_POST['name']);
    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);
    $product->setQuantity($_POST['quantity']);
    $productManager->update($product);
    header('Location: /products/index.php');
}    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>
<body>
    <form action="">
        <input type="text" name="name" value="<?= $product->getName(); ?>">
        <input type="text" name="description" value="<?= $product->getDescription(); ?>">
        <input type="text" name="price" value="<?= $product->getPrice(); ?>">
        <input type="text" name="quantity" value="<?= $product->getQuantity(); ?>">
        <button type="submit" name="btnSubmit">Modifier</button>
    </form>
</body>
</html>