<?php 

include_once "../config/conection.php";

session_start();
$lengpass = "&lowast;";
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
                <script type="text/javascript">
                $(function () {
                    
                    var filterList = {
                    
                        init: function () {
                        
                            // MixItUp plugin
                            // http://mixitup.io
                            $('#portfoliolist').mixitup({
                                targetSelector: '.portfolio',
                                filterSelector: '.filter',
                                effects: ['fade'],
                                easing: 'snap',
                                // call the hover effect
                                onMixEnd: filterList.hoverEffect()
                            });             
                        
                        },
                        
                        hoverEffect: function () {
                        
                            // Simple parallax effect
                            $('#portfoliolist .portfolio').hover(
                                function () {
                                    $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                                    $(this).find('img').stop().animate({top: 0}, 500, 'easeOutQuad');               
                                },
                                function () {
                                    $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeInQuad');
                                    $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');                               
                                }       
                            );              
                        
                        }
            
                    };
                    
                    // Run the show!
                    filterList.init();
                    
                    
                }); 
                </script>
                <!-- Add fancyBox main JS and CSS files -->
                <script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
                <link href="../css/magnific-popup.css" rel="stylesheet" type="text/css">
                        <script>
                            $(document).ready(function() {
                                $('.popup-with-zoom-anim').magnificPopup({
                                    type: 'inline',
                                    fixedContentPos: false,
                                    fixedBgPos: true,
                                    overflowY: 'auto',
                                    closeBtnInside: true,
                                    preloader: false,
                                    midClick: true,
                                    removalDelay: 300,
                                    mainClass: 'my-mfp-zoom-in'
                            });
                        });
                        </script>
                <script type="text/javascript" src="../js/move-top.js"></script>
                <script type="text/javascript" src="../js/easing.js"></script>
                <!----end gallery--------- -->
                
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $(".scroll").click(function(event){     
                        event.preventDefault();
                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
                    });
                });
            </script>
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
        <h2>Gestión de usuarios</h2>
        <div class="section group">
              <div>
                      <div id="auditoria">
        <table style="width:1300px; margin-top:0;" >
          <tr>
            <th style="text-align:center;">Usuario</th>
            <th style="text-align:center;">Contraseña</th>
            <th style="text-align:center;">Tipo de usuario</th>
            <th style="text-align:center;">Operaciones</th>
          </tr>
          <?php

          $usuarios = mysql_query("SELECT * FROM users ");

          while ($row = mysql_fetch_assoc($usuarios))
          {
            $contrasena = strlen($row['password']);
            if($row['rol'] == 1) $rol = "Administrador(a)";
             elseif ($row['rol'] == 2) $rol = "Docente";
             elseif ($row['rol'] == 3) $rol = "Administrativo(a)";
             elseif ($row['rol'] == 4) $rol = "Obrero(a)";
          ?>
          <tr>
            <td style="text-align:center;"><?=$row['user']?></td>
            <td style="text-align:center;"><?php for($i=0; $i < $contrasena; $i ++)    echo $lengpass; ?></td>
            <td style="text-align:center;"><?=$rol?></td>
            <td style="text-align:center;"><?php if($row['id_user'] != 1){ ?><a href="user.php?op=update-user&id=<?=$row['id_user']?>">Actualizar</a> - <a href="../procesos/delete.php?id=<?=$row['id_user']?>&tipo=user">Eliminar</a> <?php }?></td>
          </tr>
         <?php } ?>
        </table>
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