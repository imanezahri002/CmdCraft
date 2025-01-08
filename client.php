<?php
session_start();
include "classes/User.php";
if(!isset($_SESSION["email"])){
    header("location:./connexion.php");
}
if ($_SESSION["role"]!= 'client') {
    header("Location: connexion.php");
};
?>


