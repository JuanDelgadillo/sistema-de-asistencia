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
<!-- start gallery Script -->

<style type="text/css">

table { 
  margin: 10px 0 30px 0;
}

table tr th, table tr td { 
  background: #70D4E6;
  color: #FFF;
  padding: 7px 4px;
  text-align: left;
  border:1px solid white;
}

table tr td { 
  background: #D3F2F7;
  color: #47433F;
  border-top: 1px solid #FFF;
  padding: 7px;
}

    #auditoria {
        width:100%;
        height:400px;
        overflow: scroll;
        overflow-y:auto;
        background-color: #EEE;
        margin:0 auto;
        }

  </style>
    <script type="text/javascript" src="../js/jquery.easing.min.js"></script>  
    <script type="text/javascript" src="../js/jquery.mixitup.min.js"></script>
</head>

<body>
        <!----start-header--------- -->
                <div class="header_bg">
                    <div class="wrap">
                        <div class="header">
                            <!--------start-logo---- -->
                            <div class="logo">
                              <a href="./"><img src="../images/insignia.png" width="132px" height="88px" alt="" /></a>
                            </div>  
                            <span id="titulo">U. E. Gabriela Mistral</span>
                            <!--------end-logo------- -->
                            <!----start-nav------ -->   
                            <div class="nav">
                                <ul>
                                   <li><a href="../" >Inicio</a></li>
                                   <?php  

            if(isset($_SESSION['user']))
            {
              ?>
                                   <li ><a href="user.php" ><?=$_SESSION['user']?></a></li>
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

    <script type="text/javascript" src="js/fliplightbox.min.js"></script>
    <script type="text/javascript">$('body').flipLightBox()</script>
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
        <h2>Auditoría</h2>
        <div class="section group">
              <div>
                      <div id="auditoria">
        <table style="width:1800px; margin-top:0;" >
          <tr>
            <th style="text-align:center;">Usuario</th>
            <th style="text-align:center;">Tipo de Usuario</th>
            <th style="text-align:center;">Operación</th>
            <th style="text-align:center;">Fecha - Hora</th>
          </tr>
          <?php

          $activos = mysql_query("SELECT * FROM auditoria  ORDER BY fecha DESC");

          while ($row = mysql_fetch_assoc($activos))
          {
          ?>
          <tr>
            <td style="text-align:center;"><?=$row['usuario']?></td>
            <td style="text-align:center;"><?=$row['tipo_usuario']?></td>
            <td style="text-align:center;"><?=$row['operacion']?></td>
            <td style="text-align:center;"><?=$row['fecha']?></td>
          </tr>
         <?php } ?>
        </table>
      </div>
                </div>
                 <div class="clear"></div>
              </div>
              </div>
              <span><input class="submit" type="submit" value="Aceptar" name="aceptar" /></span>
        </div>
        <br/><br/><br/><br/>
     <div class="footer-bottom">
        <div class="wrap">
        <div class="copy">
            <p class="copy">&#169 Desarrollado por: Atencio Adrian, Sanchez Richard, Gonzalez Adrian y Zambrano Ezequiel 2015</p>
        </div>
        <script type="text/javascript">
                            $(document).ready(function() {
                                
                                var defaults = {
                                    containerID: 'toTop', // fading element id
                                    containerHoverID: 'toTopHover', // fading element hover id
                                    scrollSpeed: 1200,
                                    easingType: 'linear' 
                                };
                                
                                
                                $().UItoTop({ easingType: 'easeOutQuart' });
                                
                            });
                        </script>
         <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>
         <script src="js/jquery.scrollTo.js"></script>
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