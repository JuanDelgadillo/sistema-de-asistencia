<?php  

include_once "../config/conection.php";

session_start();

if(isset($_SESSION['user']))
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
    .contact-form input[type="number"]{
    padding: 15px;
    display: block;
    width: 43%;
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
</style>
</head>

<body>
        <!----start-header--------- -->
                <div class="header_bg">
                    <div class="wrap">
                        <div class="header">
                            <!--------start-logo---- -->
                            <div class="logo">
                                <a href="../"><img src="../images/logo.png" width="222px" height="58px" alt="" /></a>
                            </div>
                            <span id="titulo">U. E. Gabriela Mistral</span>
                            <!--------end-logo------- -->
                            <!----start-nav------ -->   
                            <div class="nav">
                                <ul>
                                   <li><a href="../" >Inicio</a></li>
                                   <li class="active"><a href="" >Asistencia</a></li>
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
        <h2>Control de asistencia</h2>
        <div class="section group">
              <div class="col span_2_of_3">
                  <div class="contact-form">
                      <form method="post" action="../procesos/update-user.php">
                            
                                <input type="number" name="cedula" class="textbox" value="" required placeholder="Ingresa tu cedula">
                                <div class="clear"> </div>
                                <div class="clear"> </div>
                          <span><input type="submit" name="search" value="Aceptar"></span>
                          <div class="clear"></div>
                        </form>
                  </div>
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