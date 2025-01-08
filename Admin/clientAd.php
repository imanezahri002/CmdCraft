<?php
include './layout/header.php';
include './layout/aside.php';
include '../classes/Admin.php';

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
                        <h2>Recent Clients</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Tel</th>
      <th scope="col">Activer</th>
      <th scope="col">Desactiver</th>
    </tr>
  </thead>
  <tbody>
   <?php
   $clients = new Admin(null ,null,null,null);
   $clients->displayCl();
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