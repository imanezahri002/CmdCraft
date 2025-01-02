<?php
require_once 'classes/ProductManager.php';
$productManager = new ProductManager();
$products = $productManager->displayAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher</title>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($products as $product) {
            echo $product->rendreRow();
        } 
        ?>
    </table>
</body>
</html>