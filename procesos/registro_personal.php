<?php

session_start();
require("../config/conection.php");

extract($_REQUEST);

if(! isset($_SESSION['user']))
{
  header("Location:../");
}

if(isset($aceptar))
{
    $fecha_nacimiento = $ano_nac."/".$mes_nac."/".$dia_nac;

    $verificar_existencia = mysql_query("SELECT * FROM persona WHERE cedula = '$cedula' ");

    if(mysql_num_rows($verificar_existencia) == 0)
    {
        $data_persona = mysql_query("INSERT INTO persona (cedula, nombre, apellido, sexo, fecha_nac, grado_instruccion) VALUES ('$cedula','$nombre','$apellido','$sexo','$fecha_nacimiento','$grado_instruccion')");
    }
    else
    {
        $_SESSION['menssage'] = "Ya existe una persona registrada en el sistema identificada con la cedula ".$cedula;
        header("Location:../modulos/registro_personal.php");
        die();
    }

    if($categoria == "Administrativo")
    {
        var_dump($_REQUEST);
        $data_administrativo = mysql_query("INSERT INTO administrativo (cedula, turno, especialidad, area) VALUES ('$cedula','$turno','$especialidad','$area')");
    }
    elseif($categoria == "Docente")
    {
        $data_docente = mysql_query("INSERT INTO docente (cedula, turno, especialidad, asignatura) VALUES ('$cedula','$turno','$especialidad','$asignatura')");
    }
    elseif($categoria == "Obrero")
    {
        $data_obrero = mysql_query("INSERT INTO docente (cedula, turno, area) VALUES ('$cedula','$turno','$area')");
    }

    $_SESSION['menssage'] = "La persona se ha registrado satisfactoriamente.";
    header("Location:../modulos/registro_personal.php");
}
else
{
    header("Location:../");
}
