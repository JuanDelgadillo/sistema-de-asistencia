<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

if(isset($cedula))
{
    $fecha = date("Y-m-d");

    if($_SESSION['proceso'] == "Entrada")
    {
        $asistenciaEntrada = mysql_query("UPDATE asistencia SET fecha_hora_entrada = NOW(), foto_entrada = '$foto', verificacion_entrada = 'Asistencia' WHERE cedula = '$cedula' AND fecha = '$fecha' ");
    }
    elseif($_SESSION['proceso'] == "Salida")
    {
        $asistenciaEntrada = mysql_query("UPDATE asistencia SET fecha_hora_salida = NOW(), foto_salida = '$foto', verificacion_salida = 'Asistencia' WHERE cedula = '$cedula' AND fecha = '$fecha' ");
    }
    
    unset($_SESSION['proceso']);
    unset($_SESSION['cedula_persona']);
    $_SESSION['menssage'] = "La asistencia ha sido registrada satisfactoriamente.";
    header("Location:../modulos/asistencia.php");
}
else
{
    header("Location:../");
}
