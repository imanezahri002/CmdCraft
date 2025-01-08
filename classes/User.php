<?php

include(dirname(__FILE__) . '/../database.php');
class User{
    protected $nom;
    protected $email;
    protected $password;
    protected $tel;

    public function __construct($nom,$email,$password,$tel){
        $this->nom=$nom;
        $this->email=$email;
        $this->password=$password;
        $this->tel=$tel;
    }
    public function getName(){}
    public function getEmail(){}
    public function getPassword(){}
    public function setName(){}
    public function setEmail(){}
    public function setPassword(){}
    public function create(){
        $conn = Database::getConnection();
        $sql="SELECT * FROM user WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":email" => $this->email]);
        $useR = $stmt->fetch();


        if ($useR) {

            throw new Exception("the user is already registred");
        }
        $hashedpassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql="INSERT INTO user (nom,email,password,tel,type) VALUES(:nom,:email,:password,:tel,:type)";
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ":nom"=>$this->nom,
            ":email"=>$this->email,
            ":password"=>$hashedpassword,
            ":tel"=>$this->tel,
            ":type"=>"client"
        ]);


    }
    public function login(){
        $conn = Database::getConnection();
        $sql="SELECT * FROM user WHERE email=:email";
        $stmt=$conn->prepare($sql);
        $stmt->execute([":email"=>$this->email]);
        $useR=$stmt->fetch();
        if($useR && password_verify($this->password,$useR["password"])){
           $_SESSION["userid"]=$useR["id"];
           $_SESSION["email"]=$useR["email"];
           $_SESSION["role"]=$useR["type"];
        //    print_r($_SESSION["role"]);
           if ($useR["type"]=="admin") {
               header("location:./Admin/admin.php");
            }else{
             header("location:./Admin/client.php");

           }

        }
    }
}

?>