<?php  

include_once "../config/conection.php";

session_start();
ini_set("display_errors",0);

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
<script src="../js/fecha.js"></script>
<style>
    .contact-form input[type="text"], .contact-form input[type="email"], .contact-form input[type="date"] {
    width: 23%;
    margin-right: 2em;
}
.contact-form .sexo {
    width: 26%;
    margin-right: 2em;
}
.contact-form input[type="text"]:nth-child(2), .contact-form input[type="password"]:nth-child(2)
{
    margin-right: 2em;
}
.contact-form input[type="text"]:nth-child(1) {
    margin-left:10%;
}
select {
    margin-right: 0em;
}
.contact-form form input[type="submit"] 
{
    float: right;
    margin-right: 50%;   
}
</style>
<script>

    window.addEventListener("load",function(){
        tipo_reporte.addEventListener('change',function(){
            if(tipo_reporte.value == "Por cedula")
            {
                cedula.disabled = false;
            }
            else
            {
                cedula.disabled = true;
            }
        },false);
    },false);

</script>
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
    </div>
    </div>
    </div>
</div>
<!---End-gallery--- -->

<!---------end-about----------- -->
<div class="contact" id="contact">
    <div class="wrap">
        <h2>Reportes</h2>
        <div class="section group">
                  <div class="contact-form">
        <form name="singup_inventario" method="POST" action="../procesos/reporte.php">
            <p class="titulos"><span>Desde</span> <span style="margin-left:24.3%;">Hasta</span></p>
            <input type="date" name="fdesde" required />
            <input type="date" name="fhasta" required />

            <div class="clear"> </div>
            <div class="clear"> </div>
            <p class="titulos"><span>Tipo de reporte</span> <span style="margin-left:18.2%;">Foto</span></p>
              <select class="sexo" id="tipo_reporte" name="tipo_reporte" required>
                <option value="">- Seleccione -</option>
                <option value="Docentes">Docentes</option>
                <option value="Administrativos">Administrativos</option>
                <option value="Obreros">Obreros</option>
                <option value="Todos">Todos</option>
                <option value="Por cedula">Por cédula</option>
              </select>
                    <select class="sexo" name="foto" required>
                <option value="">- Seleccione -</option>
                <option value="No incluir foto">No incluir foto</option>
                <option value="Incluir foto">Incluir foto</option>
              </select>
            <div class="clear"> </div>
            <div class="clear"> </div>
           <p class="titulos"><span>Cédula</span></p>
            <input type="text" name="cedula" id="cedula" placeholder="Cédula" disabled="true" />
            <div class="clear"> </div>
            <div class="clear"> </div>      
            
            <span><input class="submit" type="submit"<?php if(isset($cedula)){ ?> value="Actualizar" name="actualizar"<?php }else{ ?>value="Aceptar" name="aceptar"<?php } ?>  /></span>
        </form>
                  </div>
                 <div class="clear"></div>
              </div>
              </div>
        </div>
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