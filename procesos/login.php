<?php 

session_start();

include_once "../config/conection.php";

if(isset($_POST['ingresar']))
{
    extract($_REQUEST);

    $usuario = mysql_real_escape_string($_POST['user']);
    $contrasena = mysql_real_escape_string($_POST['contrasena']);
    $contrasena = base64_encode($contrasena);

    $sql = mysql_query(" SELECT * FROM users WHERE user = '".$usuario."' AND password = '".$contrasena."' ")or die("Error al Validar la Contraseña");

    if ($row = mysql_fetch_assoc($sql)) 
    {
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['user'] = $row['user'];
        $_SESSION['rol'] = $row['rol'];
        auditoria($_SESSION['user'],$_SESSION['rol'],"Ingreso al Sistema.");
        mysql_close($conection);
        header("Location:../");
    }
    else
    {
        $_SESSION['menssage'] = "El Usuario Ingresado no Existe en el Sistema";
        header("Location:../");
    }
}
else
{
    header("Location:../");
}


?>