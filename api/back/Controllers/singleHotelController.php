<?php
require_once "../Models/singleHotelModel.php";


$single = new singleHotelModel();
$return=array();

if (isset($_GET["id"])) {
    $return["hotel"] = $single->getHotel($_GET["id"]);
    $return["error"]="";

    if(isset($_GET["start"])&&isset($_GET["end"])){
        $start=$_GET["start"];
        $end=$_GET["end"];

        if($start>=$end){
            $return["error"] =1;

        }else {
            $checkin=date("Y-m-d",$start);
            $checkout=date("Y-m-d",$end);
            if ($single->checkDates($checkin, $checkout, $_GET["id"]) == false) {
                $return["error"] =2;
            } else {

                //Fecha como segundos
                $tiempoInicio = $start;
                $tiempoFin = $end;

                //24 horas * 60 minutos por hora * 60 segundos por minuto
                $dia = 86400;

                while ($tiempoInicio <= $tiempoFin) {

                    $date = date("Y-m-d", $tiempoInicio);
                    $insert = $single->insertBooking($_GET["id"], $_GET["userId"],$date);
                    $tiempoInicio += $dia;
                }
                //No es un error controla que las reservas se hayan realizado
                $return["error"] =3;
            }
        }
    }

} else {
    $return["error"] = "NO ID SELECTED";
}

echo json_encode($return);


//con segundos
//http://localhost/iSanchez/api/back/Controllers/singleHotelController.php?id=2&start=1644793200&end=1645311600&userId=1

//con fechas
//http://localhost/dws/api/back/Controllers/singleHotelController.php?id=1&start=2022-02-22&end=2022-02-24&idUser=7