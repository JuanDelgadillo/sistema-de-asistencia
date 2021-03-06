<?php  

include_once "../config/conection.php";

session_start();
$lengpass = "&lowast;";

if(! isset($_SESSION['user']))
{
  header("Location:../");
}


if(isset($_GET['op']) && ! empty($_GET['op']) && $_GET['op'] == "update-user")
{
  $titulo = "Actualizar usuario"; 
}
elseif(isset($_GET['op']) && ! empty($_GET['op']) && $_GET['op'] == "registered-users")
{
  $titulo = "Usuarios Registrados"; 
}
else
{
  $row = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id_user = '".$_SESSION['id_user']."' "));
  $titulo = "Perfil de Usuario";  
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
                                   <li class="active"><a href="" ><?=$_SESSION['user']?></a></li>
                                   <li class="close"><a href="../procesos/salir.php" >Cerrar sesión</a></li>
            <?php
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
        <h2><?=$titulo?></h2>
        <div class="section group">
              <div class="col span_2_of_3">
                  <div class="contact-form">
                    <?php
                    if($titulo == "Actualizar usuario"){
          if(isset($_GET['id']) && ! empty($_GET['id']) && $_GET['id'] != "")
          {
            $registro = $_GET['id'];
            $student = mysql_fetch_assoc(mysql_query("SELECT * FROM users, roles WHERE users.id_user = '$registro' AND roles.rol = users.rol "));
          }
         ?>

        <form id="singup-inventario" method="POST" action="../procesos/gestion-users.php">
            <input type="text" class="textbox" name="user" value="<? if(isset($student)){ echo $student['user']; } ?>" placeholder="Usuario" required />
            <input type="password" name="password" class="textbox" value="<? if(isset($student)){ echo base64_decode($student['password']); } ?>" placeholder="Contraseña" required />

            <div class="clear"> </div>
            <div class="clear"> </div>
              <select name="rol" required>
                <option value="">- Privilegio Administrativo -</option>
                <?php if(isset($student) && $student['rol'] == 1){ ?>
                <option selected value="1">Administrador(a)</option>
                <?php }elseif(isset($student) && $student['rol'] != 1){ ?>
                <option value="1">Administrador(a)</option>
                <option selected value="<?=$student['rol']?>"><?=$student['nombre_rol']?></option>
                <?php } ?>
              </select>
            </p>

            <?php if(isset($student)){ ?>
            <input type="hidden" name="id" value="<?=$student['id_user']?>" />
            <?php } ?>

            <div class="clear"> </div>
            <div class="clear"> </div>
            
            <span><input class="submit" type="submit" name="aceptar" value="Actualizar" /></span>
        </form>
        <?php }else{ ?>
                      <form method="post" action="../procesos/update-user.php">
                            
                                <input type="text" name="user" class="textbox" value="<?=$_SESSION['user']?>" required placeholder="Usuario">
                                <input type="password" name="password" class="textbox" required value="<?=base64_decode($row['password'])?>" placeholder="Contraseña">
                                <input type="hidden" name="id" value="<?=$_SESSION['id_user']?>">
                                <div class="clear"> </div>
                                <div class="clear"> </div>
                          <span><input type="submit" name="update" value="Aceptar"></span>
                          <div class="clear"></div>
                        </form>
                        <?php } ?>
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