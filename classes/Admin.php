<?php
// require_once '../database.php';
include 'User.php';
class Admin extends User{
    
    public function displayCl(){
        
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT nom,email,tel FROM user WHERE type = :type");
        $stmt->execute([':type'=>"client"]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($users as $client){
            
          echo '<tr>';
          echo '<td>'. $client["nom"] .'</td>';
          echo '<td>'. $client["email"] .'</td>';
          echo '<td>'. $client["tel"] .'</td>';
          echo '<td><img src="../imgs/bouton-marche.png" alt="" style="width:30px;height:30px"></td>';
          echo '<td><img src="../imgs/banni.png" alt=""></td>';
          echo '</tr>';
        };
        // print_r($users);
    }
    
}


?>