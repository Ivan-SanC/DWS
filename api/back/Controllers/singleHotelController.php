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
            if ($single->checkDates($start, $end, $_GET["id"]) == false) {
                $return["error"] =2;
            } else {

                //Fecha como segundos
                $tiempoInicio = strtotime($start);
                $tiempoFin = strtotime($end);

                //24 horas * 60 minutos por hora * 60 segundos por minuto
                $dia = 86400;

                while ($tiempoInicio <= $tiempoFin) {

                    $date = date("Y-m-d", $tiempoInicio);
                    $single->insertBooking($_GET["id"], $_GET["idUser"],$date);
                    $tiempoInicio += $dia;
                }
                $return["error"] =3;
            }
        }
    }

} else {
    $return["error"] = "NO ID SELECTED";
}

echo json_encode($return);

//falta fechas reservas
//user y action
//checkin checkout
//error code

//http://localhost/dws/api/back/Controllers/singleHotelController.php?id=1&start=2022-02-22&end=2022-02-24&idUser=7