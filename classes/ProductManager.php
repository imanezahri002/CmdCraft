<?php
require '../database.php';


class ProductManager
{
    public function displayAll()
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM product");
        $stmt->execute();
        $products = $stmt->fetchAll();
        $data = [];
        foreach ($products as $product) {
            $data[] = new Product($product['name'], $product['prix'], $product['description'], $product['quantity'],$product['image'],$product['id']);
        };
        return $data;// [ Product, Product, Product]
    }
    public function rendreRow(Product $produit)
    {
        return "<tr>
                    <td>".$produit->getName()."</td>
                    <td>".$produit->getDescription()."</td>
                    <td>".$produit->getPrice()."</td>
                    <td><img width ='60px' src='".$produit->getImage()."'></td>
                    <td>".$produit->getQuantity()."</td>
                    <td>
                        <a class='btn btn-primary' href='../Admin/editPr.php?id=". $produit ->getId() ."'>Edit</a>
                        <a class='btn btn-danger' href='../Admin/deletePr.php?id=".$produit ->getId()."'>Delete</a>
                    </td>
                </tr>";
    }

    public function delete($id)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
        // $stmt->bindParam(':id', $id);
        $stmt->execute([
            ':id' => $id
        ]);
    }    

    public function getProduct($id)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([
            ':id' => $id
        ]);
        $product = $stmt->fetch();
        return new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity']);
    }

    public function update(Product $product)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity WHERE id = :id");
        $stmt->execute([
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':price' => $product->getPrice(),
            ':quantity' => $product->getQuantity(),
            ':id' => $product->getId()
        ]);
    }
    public function add(Product $product){
        $conn=Database::getConnection();
        $sql="INSERT INTO product (name,prix,image,quantity,description) VALUES (:name,:prix,:image,:quantity,:description)";
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ":name"=>$product->getName(),
            ":prix"=>$product->getPrice(),
            ":image"=>$product->getImage(),
            ":quantity"=>$product->getQuantity(),
            ":description"=>$product->getDescription()
        ]);
        
    }
    
}
