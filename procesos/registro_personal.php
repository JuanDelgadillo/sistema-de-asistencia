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
        $password = base64_encode($cedula);
    }
    else
    {
        $_SESSION['menssage'] = "Ya existe una persona registrada en el sistema identificada con la cedula ".$cedula;
        header("Location:../modulos/registro_personal.php");
        die();
    }

    if($categoria == "Administrativo")
    {
        $data_administrativo = mysql_query("INSERT INTO administrativo (cedula, turno, especialidad, area) VALUES ('$cedula','$turno','$especialidad','$area')");
        $user = mysql_query("INSERT INTO users (cedula, user, password, rol) VALUES ('$cedula','$cedula','$password', 3) ");
    }
    elseif($categoria == "Docente")
    {
        $data_docente = mysql_query("INSERT INTO docente (cedula, turno, especialidad, asignatura) VALUES ('$cedula','$turno','$especialidad','$asignatura')");
        $user = mysql_query("INSERT INTO users (cedula, user, password, rol) VALUES ('$cedula','$cedula','$password', 2) ");

    }
    elseif($categoria == "Obrero")
    {
        $data_obrero = mysql_query("INSERT INTO obrero (cedula, turno, area) VALUES ('$cedula','$turno','$area')");
        $user = mysql_query("INSERT INTO users (cedula, user, password, rol) VALUES ('$cedula','$cedula','$password', 4) ");
    }

    $_SESSION['menssage'] = "La persona se ha registrado satisfactoriamente.";
    header("Location:../modulos/registro_personal.php");
}
elseif(isset($actualizar))
{
    $fecha_nacimiento = $ano_nac."/".$mes_nac."/".$dia_nac;

    if($cedula_get != $cedula)
    {
        $verificar_existencia = mysql_query("SELECT * FROM persona WHERE cedula = '$cedula' ");

        if(mysql_num_rows($verificar_existencia) == 0)
        {
            $update_persona = mysql_query("UPDATE persona SET cedula = '$cedula', nombre = '$nombre', apellido = '$apellido', sexo = '$sexo', fecha_nac = '$fecha_nacimiento', grado_instruccion = '$grado_instruccion' WHERE cedula = '$cedula_get' ");
        }
        else
        {
            $_SESSION['menssage'] = "Ya existe una persona registrada en el sistema identificada con la cedula ".$cedula;
            header("Location:../modulos/registro_personal.php?cedula=".$cedula_get);
            die();
        }
    }
    else
    {
        $update_persona = mysql_query("UPDATE persona SET cedula = '$cedula', nombre = '$nombre', apellido = '$apellido', sexo = '$sexo', fecha_nac = '$fecha_nacimiento', grado_instruccion = '$grado_instruccion' WHERE cedula = '$cedula' ");
        
        if($categoria_antes == $categoria)
        {
            if($categoria == "Administrativo")
            {
                $data_administrativo = mysql_query("UPDATE administrativo SET cedula = '$cedula', turno = '$turno', especialidad = '$especialidad', area = '$area' WHERE cedula = '$cedula' ");
            }
            elseif($categoria == "Docente")
            {
                $data_docente = mysql_query("UPDATE docente SET cedula = '$cedula', turno = '$turno', especialidad = '$especialidad', asignatura = '$asignatura' WHERE cedula = '$cedula' ");
            }
            elseif($categoria == "Obrero")
            {
                $data_obrero = mysql_query("UPDATE obrero SET cedula = '$cedula', turno = '$turno', area = '$area' WHERE cedula = '$cedula' ");
            }
        }
        else
        {
            if($categoria_antes == "Administrativo")
            {
                $data_administrativo = mysql_query("DELETE FROM administrativo WHERE cedula = '$cedula' ");
            }
            elseif($categoria_antes == "Docente")
            {
                $data_docente = mysql_query("DELETE FROM docente WHERE cedula = '$cedula' ");
            }
            elseif($categoria_antes == "Obrero")
            {
                $data_obrero = mysql_query("DELETE FROM obrero WHERE cedula = '$cedula' ");
            }

            if($categoria == "Administrativo")
            {
                $data_administrativo = mysql_query("INSERT INTO administrativo (cedula, turno, especialidad, area) VALUES ('$cedula','$turno','$especialidad','$area')");
                $user = mysql_query("UPDATE users SET rol = 3 WHERE cedula = '$cedula' ");
            }
            elseif($categoria == "Docente")
            {
                $data_docente = mysql_query("INSERT INTO docente (cedula, turno, especialidad, asignatura) VALUES ('$cedula','$turno','$especialidad','$asignatura')");
                $user = mysql_query("UPDATE users SET rol = 2 WHERE cedula = '$cedula' ");
            }
            elseif($categoria == "Obrero")
            {
                $data_obrero = mysql_query("INSERT INTO obrero (cedula, turno, area) VALUES ('$cedula','$turno','$area')");
                $user = mysql_query("UPDATE users SET rol = 4 WHERE cedula = '$cedula' ");
            }
        }

        $_SESSION['menssage'] = "Los datos de la persona se actualizaron satisfactoriamente.";
        header("Location:../modulos/gestion-users.php");
        }
}
else
{
    header("Location:../");
}

