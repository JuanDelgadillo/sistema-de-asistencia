<?php  

session_start();
include_once "../config/conection.php";

if(isset($_POST['update']))
{
    $user = mysql_real_escape_string($_POST['user']);
    $password = mysql_real_escape_string($_POST['password']);
    $password = base64_encode($password);
    $registro = $_POST['id'];
    
    $vuser = mysql_query("SELECT * FROM users WHERE user = '$user' AND id_user != '$registro' ");

    if(mysql_num_rows($vuser) == 0)
    {
        $update = mysql_query("UPDATE users SET user = '$user', password = '$password' WHERE id_user = '$registro' ")or die(mysql_error());
        auditoria($_SESSION['user'],$_SESSION['rol'],"Actualizo sus datos personales de la cuenta de usuario en el sistema.");
        $_SESSION['menssage'] = "Los datos del Usuario se actualizaron satisfactoriamente.";
        $_SESSION['user'] = $user;
    }
    else
    {
        $_SESSION['menssage'] = "Ya existe un usuario con el nombre: ".$user." intente nuevamente con uno diferente.";

        auditoria($_SESSION['user'],$_SESSION['rol'],"Intento actualizar su nombre de usuario: ".$_SESSION['user']." al ".$user." ya existente.");      
    }

    header("Location:../modulos/user.php");
}
else
    header("Location:../");


?>