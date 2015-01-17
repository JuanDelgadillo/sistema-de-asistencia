<?php  

session_start();
include_once "../config/conection.php";

if(isset($_GET['id']) && ! empty($_GET['id']) && $_GET['id'] != "")
{
    $registro = $_GET['id'];
    if(isset($_GET['tipo']) && $_GET['tipo'] == "article")
    {
        $data = mysql_fetch_assoc(mysql_query("SELECT * FROM articulos WHERE id_activo = '".$registro."' "));
    $delete = mysql_query("DELETE FROM articulos WHERE id_activo = '$registro' ");
    $_SESSION['menssage'] = "El articulo fue eliminado del inventario satisfactoriamente.";
    auditoria($_SESSION['user'],$_SESSION['rol'],"Elimino un articulo de nombre: ".$data['nombre'].", cantidad: ".$data['cantidad'].", de tipo: ".$data['tipo']." en el area de ".$data['area'].", para el grado ".$data['grado']);
    header("Location:../modulos/inventario.php");
    die();
    }
    elseif(isset($_GET['tipo']) && $_GET['tipo'] == "student")
    {
        $data = mysql_fetch_assoc(mysql_query("SELECT * FROM estudiantes WHERE id_estudiante = '".$registro."' "));
        $delete = mysql_query("DELETE FROM estudiantes WHERE id_estudiante = '$registro' ");
        $_SESSION['menssage'] = "El estudiante fue eliminado satisfactoriamente.";
        auditoria($_SESSION['user'],$_SESSION['rol'],"Elimino a un Estudiante de nombre: ".$data['nombres']." ".$data['apellidos']." en el grado: ".$data['grado']." y seccion: ".$data['seccion'].", identificado con la cedula: ".$data['cedula']);
        header("Location:../modulos/estudiantes.php");
        die();
    }
    elseif(isset($_GET['tipo']) && $_GET['tipo'] == "user")
    {
        $data = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id_user = '".$registro."' "));
        if($data['rol'] == 1) $privilegio = "Administrador(a)";
        elseif ($data['rol'] == 2) $privilegio = "Docente";
        elseif ($data['rol'] == 3) $privilegio = "Administrativo(a)";
        elseif ($data['rol'] == 4) $privilegio = "Obrero(a)";
        $delete = mysql_query("DELETE FROM users WHERE id_user = '$registro' ");
        $_SESSION['menssage'] = "El usuario fue eliminado satisfactoriamente.";
        auditoria($_SESSION['user'],$_SESSION['rol'],"Elimino a un Usuario del Sistema de nombre: ".$data['user']." con el privilegio: ".$privilegio);
        header("Location:../modulos/gestion-users.php");
        die();
    }
    else
        header("Location:../");
}
else
    header("Location:../");


?>