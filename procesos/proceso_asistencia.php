<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

if(isset($cedula))
{
    $fecha = date("Y-m-d");

    if((isset($_SESSION['proceso']) && $_SESSION['proceso'] == "Entrada") || (isset($proceso) && $proceso == "Entrada"))
    {
        $asistenciaEntrada = mysql_query("UPDATE asistencia SET fecha_hora_entrada = NOW(), foto_entrada = '$foto', verificacion_entrada = 'Asistencia' WHERE cedula = '$cedula' AND fecha = '$fecha' ");
    }
    elseif((isset($_SESSION['proceso']) && $_SESSION['proceso'] == "Salida") || (isset($proceso) && $proceso == "Salida"))
    {
        $asistenciaEntrada = mysql_query("UPDATE asistencia SET fecha_hora_salida = NOW(), foto_salida = '$foto', verificacion_salida = 'Asistencia' WHERE cedula = '$cedula' AND fecha = '$fecha' ");
    }
    
    $_SESSION['menssage'] = "La asistencia ha sido registrada satisfactoriamente.";

    if(isset($proceso) && $proceso == "Entrada")
    {
        header("Location:../");
    }
    elseif(isset($proceso) && $proceso == "Salida")
    {
        header("Location:../");
    }
    else
    {
        unset($_SESSION['proceso']);
        unset($_SESSION['cedula_persona']);
        header("Location:../modulos/asistencia.php");
    }
}
else
{
    header("Location:../");
}
