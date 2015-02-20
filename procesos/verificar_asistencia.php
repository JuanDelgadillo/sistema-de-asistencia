<?php

session_start();
include_once "../config/conection.php";

if(isset($_SESSION['user']))
{
  header("Location:../");
}

extract($_REQUEST);

if(isset($search))
{
    $personas = mysql_query("SELECT * FROM persona");
    $fecha = date("Y-m-d");
    while($persona = mysql_fetch_assoc($personas))
    {
        $cedula_persona = $persona['cedula'];
        $verificacion_asistencia = mysql_query("SELECT * FROM asistencia WHERE cedula = '$cedula_persona' AND fecha = '$fecha' ");
        if(mysql_num_rows($verificacion_asistencia) == 0)
        {
            $asistencia = mysql_query("INSERT INTO asistencia (cedula, fecha, verificacion_entrada, verificacion_salida) VALUES ('$cedula_persona','$fecha','Inasistente','Inasistente')");
        }

    }

    $verificar_persona = mysql_query("SELECT * FROM persona WHERE cedula = '$cedula' ");

    if(mysql_num_rows($verificar_persona) != 0)
    {
        $verificar_asistencia = mysql_query("SELECT * FROM asistencia WHERE cedula = '$cedula' AND fecha = '$fecha' ");
        $persona = mysql_fetch_assoc($verificar_asistencia);

        if($persona['verificacion_entrada'] == "Inasistente")
        {
            $_SESSION['cedula_persona'] = $cedula;
            $_SESSION['proceso'] = "Entrada";
            header("Location:../modulos/asistencia.php");
        }
        else if($persona['verificacion_salida'] == "Inasistente")
        {
            $_SESSION['cedula_persona'] = $cedula;
            $_SESSION['proceso'] = "Salida";
            header("Location:../modulos/asistencia.php");
        }
        else
        {
            $_SESSION['menssage'] = "Ya registraste la entrada y salida del día de hoy.";
            header("Location:../modulos/asistencia.php");
        }
        
    }
    else
    {
        $_SESSION['menssage'] = "No existe una persona registrada en el sistema identificada con la cedula ".$cedula;
        header("Location:../modulos/asistencia.php");
    }



   



}
else
{
    header("Location:../");
}
