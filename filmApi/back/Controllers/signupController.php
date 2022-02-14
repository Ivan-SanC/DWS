<?php
require_once "../Models/signupModel.php";

$return=array();
$error="";
$result=false;


if(isset($_GET["mail"])&&isset($_GET["pass"])){
    $sign=new signupModel();

    if($sign->checkUser($_GET["mail"])){
        $error="User no válido";
    }else{
        try {
            $password=crypt($_GET["pass"],bin2hex(random_bytes(10)));
        }catch (Exception $e){
            $password=crypt($_GET["pass"],"salt");
        }
        if($sign->insertUser($_GET["mail"],$password)){
            $result=true;
        }else{
            $error="Algo fallo en el registro";
        }
    }
}else{
    $error="Algo fallo en el registro";
}

$return["result"]=$result;
$return["error"]=$error;

echo json_encode($return);