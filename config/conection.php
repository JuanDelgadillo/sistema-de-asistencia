<?php

$db   = "asistencia";
$host = "localhost";
$user = "root";
$pass = "salomon";

$conex = mysql_connect($host,$user,$pass)or die("No fue posible la Conexion al Servidor ".$host);

$sdb   = mysql_select_db($db,$conex)or die("No se encontro la Base de Datos ".$db);

function auditoria($usuario,$rol,$operation)
    {
       if($rol == 1) $rol = "Administrador(a)";
       elseif ($rol == 2) $rol = "Docente";
       elseif ($rol == 3) $rol = "Administrativo(a)";
       elseif ($rol == 4) $rol = "Obrero(a)";
       $auditoria = mysql_query("INSERT INTO auditoria (usuario, tipo_usuario, operacion, fecha) VALUES ('$usuario', '$rol', '".$operation."', NOW() ) ");
    }

?>