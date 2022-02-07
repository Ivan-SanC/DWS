<?php

require_once "../Models/singleModel.php";
require_once "../Models/extrasModel.php";
session_start();
//para sacar disponibilidad
//SELECT * FROM table_booking where idHotel=1 and fecha between '2022-01-30' and '2022-02-02';

$model= new singleModel();
$extraModel=new extrasModel();
$errorCode = "";

if (isset($_GET["errorCode"])) {
    $errorCode = $_GET["errorCode"];
}

if(isset($_GET["id"])){
    $hotel=$model->getHotel($_GET["id"]);
    $_SESSION["idHotel"]=$_GET["id"];
    $comments=$extraModel->getComments($_SESSION["idHotel"]);

    if(isset($_POST["check-in"])&&isset($_POST["check-out"])){
        $start=$_POST["check-in"];
        $end=$_POST["check-out"];
        if($start>=$end){
            header( "Location: singleHotel.php?id=".$_SESSION["idHotel"]."&errorCode=1");

        }else{
            if($model->checkDates($start,$end,$_GET["id"])==false){
                header( "Location: singleHotel.php?id=".$_SESSION["idHotel"]."&errorCode=2");
            }else{

                //Fecha como segundos
                $tiempoInicio = strtotime($start);
                $tiempoFin = strtotime($end);

                //24 horas * 60 minutos por hora * 60 segundos por minuto
                $dia = 86400;

                while($tiempoInicio <= $tiempoFin){

                    $date = date("Y-m-d", $tiempoInicio);
                    $model->insertBooking($date,$_SESSION["idHotel"],$_SESSION["userId"]);
                    $tiempoInicio += $dia;

                }
                header( "Location: singleHotel.php?id=".$_SESSION["idHotel"]."&errorCode=3");

            }

        }

    }

    require_once "../Views/singleHotelView.php";
}else{
    header("Location: list.php");
}