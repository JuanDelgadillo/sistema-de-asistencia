<?php  

include_once "../config/conection.php";

session_start();

if(! isset($_SESSION['user']))
{
  header("Location:../");
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sistema de asistencia</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'> -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imgeffect.css" />
<script src="../js/jquery.min.js"></script>
<style>
    .contact-form input[type="text"] {
    padding: 15px;
    display: block;
    width: 20%;
    background:#fff;
    outline: none;
    color:#000000;
    font-size: 0.8125em;
    -webkit-appearance: none;
    float:left;
    margin-right: 2em;
    font-family: 'Lato', sans-serif;
    font-style: italic;
    border: 2px solid #CACACA;
}
.contact-form .sexo {
    width: 23%;
    margin-left:10%;
}
.contact-form input[type="text"]:nth-child(2), .contact-form input[type="password"]:nth-child(2)
{
    margin-right: 2em;
}
.contact-form input[type="text"]:nth-child(1) {
    margin-left:10%;
}
</style>
</head>

<body>
        <!----start-header--------- -->
                <div class="header_bg">
                    <div class="wrap">
                        <div class="header">
                            <!--------start-logo---- -->
                            <div class="logo">
                                <a href="./"><img src="../images/logo.png" width="222px" height="58px" alt="" /></a>
                            </div>  
                            <!--------end-logo------- -->
                            <!----start-nav------ -->   
                            <div class="nav">
                                <ul>
                                   <li><a href="../" >Inicio</a></li>
                                   <?php  

            if(isset($_SESSION['user']))
            {
              ?>
                                   <li><a href="" ><?=$_SESSION['user']?></a></li>
                                   <li class="close"><a href="../procesos/salir.php" >Cerrar sesión</a></li>
            <?
            }

            ?>
                                 <div class="clear"> </div>
                                 </ul>
                            </div>
                            <!-----end-nav------ -->
                            <div class="clear"> </div>
                        </div>
                    </div>
                </div>
        <!------end-header---------- -->
        <!-- start slider -->
<div class="slider_bg">
        <div class="wrap">
                <!---start-da-slider--- -->               

        </div>
</div>
<!-----end-slider------ -->
    <div class="clear"> </div>
    </div>
    </div>
    </div>
</div>
<!---End-gallery--- -->

<!---------end-about----------- -->
<div class="contact" id="contact">
    <br/><br/>
    <div class="wrap">
        <h2>Registro del personal</h2>
        <div class="section group">
                  <div class="contact-form">
    <style>
    
    label{
        border: 1px solid black;
        display:inline;
    }

    </style>
        <form id="singup-inventario" method="POST" action="../procesos/gestion-users.php">
            <label for="full_name">Cedula</label>
            <input type="text" class="form-control" name="cedula" value="" placeholder="Cedula" required />
            <input type="text" class="form-control" name="nombre" class="textbox" value="" placeholder="Nombre" required />
            <input type="text" class="form-control" name="apellido" class="textbox" value="" placeholder="Apellido" required />

            <div class="clear"> </div>
            <div class="clear"> </div>
              <select class="sexo" name="sexo" required>
                <option value="">- Sexo -</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
              </select>
            <select style="width: 75px;" name="dia_nac" required>
                                    <option value=" ">D&iacute;a</option>
                                </select>

                                <select style="width: 120px;" name="mes_nac" onchange="d_m_fnac();" required>
                                    <option value="0" >Mes</option>
                                    <option value="1"  >Enero</option>
                                    <option value="2"  >Febrero</option>
                                    <option value="3"  >Marzo</option>
                                    <option value="4"  >Abril</option>
                                    <option value="5"  >Mayo</option>
                                    <option value="6"  >Junio</option>
                                    <option value="7"  >Julio</option>
                                    <option value="8"  >Agosto</option>
                                    <option value="9"  >Septiembre</option>
                                    <option value="10"  >Octubre</option>
                                    <option value="11"  >Noviembre</option>
                                    <option value="12"  >Diciembre</option></select>

           
            <div class="clear"> </div>
            <div class="clear"> </div>
            
            <span><input class="submit" type="submit" name="aceptar" value="Aceptar" /></span>
        </form>
                  </div>
                 <div class="clear"></div>
              </div>
              </div>
        </div>
        <br/><br/><br/><br/>
     <div class="footer-bottom">
        <div class="wrap">
        <div class="copy">
            <p class="copy">&#169 Desarrollado por: Atencio Adrian, Sanchez Richard, Gonzalez Adrian y Zambrano Ezequiel 2015</p>
        </div>
        </div>
    </div>
<?php 

if(isset($_SESSION['menssage']) && $_SESSION['menssage'] != "")
{

  printf("<script type='text/javascript' language='javascript'>

  alert('".$_SESSION['menssage']."');

    </script>");

  unset($_SESSION['menssage']);
}

 ?>
</body>
</html>