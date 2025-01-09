<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $prix;
    private $image;
    private $quantity;

    public function __construct($name, $description, $prix, $quantity,$image,$id=null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->prix = $prix;
        $this->quantity = $quantity;
        $this->image=$image;
        $this->id=$id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPrice()
    {
        return $this->prix;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setName($name)
    {
        
        $this->name = $name;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setPrice($prix)
    {
        $this->price = $price;
    }
    public function setImage($image)
    {
        return $this->image;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
  

    // public function __destruct()
    // {
    //     echo "Product object is destroyed\n";
    // }

   
}
