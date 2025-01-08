<?php
include './layout/header.php';
include './layout/aside.php';
require '../classes/ProductManager.php';
require '../classes/Product.php';
// include(dirname(__FILE__) . '/../ProductManager.php');
// include(dirname(__FILE__) . '/../Product.php');
$productM=new ProductManager();
$products=$productM->displayAll();

if(isset($_POST["add"])){
     $nom=$_POST["nom"];
     $description=$_POST["desc"];
     $image=$_POST["img"];
     $prix=$_POST["price"];
     $quantity=$_POST["qte"];
     
     $pdt=new Product($nom, $description, $prix, $quantity,$image);
     $productM->add($pdt);
     header ("location:produitAd.php");

}
?>
   <!-- ========================= Main ==================== -->
   <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="../assets/imgs/customer01.jpg" alt="">
                </div>
            </div>
        
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Products</h2>
                        <!-- <a href="#" class="btn">Ajouter</a> -->
                       <!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Nom</label>
    <input  name="nom" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input  name="desc" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input name="img" type="text" class="form-control" id="exampleInputPassword1" placeholder="url:http/....">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input name="price" type="number" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantity</label>
    <input name="qte" type="number" class="form-control" id="exampleInputPassword1">
  </div>
  
</div>
<div class="modal-footer">
    <button type="submit" class="btn" name="add">Ajouter</button>
</form>
      </div>
    </div>
  </div>
</div>
</div>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody class="align-middle">
   <?php

    foreach ($products as $product) {
        echo $productM->rendreRow($product);
    }
   ?>
  
  </tbody>
</table>
      </div>
</div>
<?php
include './layout/footer.php';
?>
</body>
</html>