<?php 

session_start();

include_once "../config/conection.php";

if(isset($_SESSION['user']))
{
    auditoria($_SESSION['user'],$_SESSION['rol'],"Finalizo Sesión.");
    session_destroy();
    header("Location:../");
}
else
{
    header("Location:../");
}


?>