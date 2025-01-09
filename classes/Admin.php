<?php
// require_once '../database.php';
include 'User.php';
class Admin extends User{
    
    public function displayCl(){
        
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT id,nom,email,tel,status FROM user WHERE type = :type");
        $stmt->execute([':type'=>"client"]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($users as $client){
       
          echo '<tr>';
          echo '<td>'. $client["nom"] .'</td>';
          echo '<td>'. $client["email"] .'</td>';
          echo '<td>'. $client["tel"] .'</td>';

          echo '<form action="" method="POST">
          <input type="hidden" value="'.$client["id"].'" name="id">';
          if($client["status"]=='desactive'){
            echo '<td><button type="submit" style="border-radius:50%" name="active"><img src="../imgs/bouton-marche.png" alt="" style="width:30px;height:30px"></button></td>';
          }else{
           echo ' <td><button type="submit" style="border-radius:50%" name="desactive"><img src="../imgs/banni.png" alt=""></button></td>';
          }
          '</form>';
          echo '</tr>';
        };
      
      
       // print_r($users);
    }
    // public function updateStatus($id){
      
    // }
    
}


?>