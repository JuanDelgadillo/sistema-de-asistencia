<?php  

session_start();
include_once "../config/conection.php";

if(isset($_POST['aceptar']))
{
    extract($_REQUEST);

    if(isset($_POST['id']))
        $v_usuario = mysql_query("SELECT * FROM users WHERE user = '".$user."' AND id_user != '".$id."' ");
    else
        $v_usuario = mysql_query("SELECT * FROM users WHERE user = '".$user."' ");

    if(mysql_num_rows($v_usuario) == 0)
    {
        $password = base64_encode($password);
        if(isset($_POST['id']))
        {
            $data = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id_user = '".$id."' "));
            $update = mysql_query("UPDATE users SET user = '$user', password = '$password', rol = '$rol' WHERE id_user = '$id' ");
            $_SESSION['menssage'] = "Los Datos se Actualizaron Satisfactoriamente";
            auditoria($_SESSION['user'],$_SESSION['rol'],"Actualizo los datos del usuario: ".$data['user']);
            $location = "Location:../modulos/user.php?op=registered-users";
        }
        else
        {
            $new_user = mysql_query("INSERT INTO users (user, password, rol) VALUES ('$user','$password','$rol') ");
            $_SESSION['menssage'] = "El usuario ha sido Registrado Satisfactoriamente";
            $location = "Location:../modulos/user.php?op=new-user"; 
            if($rol == 1)
                $privilegio = "Administrador(a)";
            else
                $privilegio = "Docente";
            auditoria($_SESSION['user'],$_SESSION['rol'],"Registro a un nuevo usuario de nombre: ".$user." con el privilegio: ".$privilegio);
        }
    }
    else
    {
        $_SESSION['menssage'] = "Ya existe un usuario con el nombre: ".$user." intente nuevamente con uno diferente.";
        auditoria($_SESSION['user'],$_SESSION['rol'],"Intento registrar un usuario de nombre: ".$user." ya existente en el sistema.");
        $location = "Location:../modulos/user.php?op=new-user";
        if(isset($_POST['id'])) $location.="&id=".$_POST['id'];
    }

    header($location);

}
else
    header("Location:../");

?>