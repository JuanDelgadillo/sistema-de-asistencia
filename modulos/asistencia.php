<?php  

include_once "../config/conection.php";

session_start();

if(isset($_SESSION['user']))
{
  header("Location:../");
}

if(isset($_SESSION['proceso']) && $_SESSION['proceso'] == "Entrada")
{
  $titulo = "Registrar asistencia de entrada";
  $cedula = $_SESSION['cedula_persona'];
  $persona = mysql_fetch_assoc(mysql_query("SELECT * FROM persona WHERE cedula = '$cedula' "));
}
elseif(isset($_SESSION['proceso']) && $_SESSION['proceso'] == "Salida")
{
  $titulo = "Registrar asistencia de salida";
  $cedula = $_SESSION['cedula_persona'];
  $persona = mysql_fetch_assoc(mysql_query("SELECT * FROM persona WHERE cedula = '$cedula' "));
}
else
{
  $titulo = "Control de asistencia";
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
  <script type="text/javascript" src="../js/hms.js"></script>
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
        <script type="text/javascript">
        $(function () {
          
          var filterList = {
          
            init: function () {
            
              // MixItUp plugin --- 105 ancho con 90 alto
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
<script type="text/javascript" src="../js/camara.js"></script>
<!-----end-slider------ -->
<?php if(isset($_SESSION['proceso']) && $_SESSION['proceso'] == "Entrada")
                    { ?>
          <div class="contenedor" style="display:none;">
        <canvas id="fotoCanvas" ></canvas>
    </div>
          <div id="small-dialog1" class="mfp-hide">
              <div class="pop_up">
                <h2>Registrar entrada</h2>
                <video id="camara" autoplay></video>
                <p class="para"><span id="hmsg"></span></p>
                <br>
                <img id="checkin" title="Aceptar" src="../images/checkin.png" alt="">
              </div>
            </div>
            
<div class="wrap" id="portfolio">
        <div class="main">
          <!-- start gallery  -->
              <div class="gallery1">
            <div class="gallery">
          <div class="clear"> </div>
          <div class="container">
            <h2><?=$titulo?></h2>
      <div id="portfoliolist">
      
      <div class="portfolio logo" data-cat="logo" >
        <div class="portfolio-wrapper">       
          <a class="popup-with-zoom-anim" href="#small-dialog1">
            <ul class="ch-grid">
            </ul>
          </a>
        </div>
      </div>    
        
      <div class="portfolio app" data-cat="app">
        <div class="portfolio-wrapper" >      
          <a class="popup-with-zoom-anim" href="#small-dialog1">
            <ul class="ch-grid" >
              <li>
                <div class="ch-item ch-img-5">
                  <div class="ch-info">
                    <img src="../images/zoom-white.png"/>
                    <h3>Registrar entrada</h3>
                  </div>
                </div>
              </li>
            </ul>
          </a>
        </div>
      </div>  
      <div class="hide">  
      <div class="portfolio web" data-cat="web">
        <div class="portfolio-wrapper">           
          <a class="popup-with-zoom-anim" href="#small-dialog2">
            <ul class="ch-grid">
            </ul>
          </a>
        </div>
      </div>  
      </div>
      
      <div class="portfolio card" data-cat="card">
        <div class="portfolio-wrapper">     
          <a class="popup-with-zoom-anim" href="#small-dialog1">
            <ul class="ch-grid">
            </ul>
          </a>
        </div>
      </div>  
           <form style="display:none;" name="asistenciaEntrada" method="POST" action="../procesos/proceso_asistencia.php">
             <input type="hidden" name="cedula" value="<?=$persona['cedula']?>">
             <input type="hidden" id="foto" name="foto" value="">
           </form>                                                                           
<span>
  Cedula: <?=$persona['cedula']?><br><br>
  Nombre: <?=$persona['nombre']?><br><br>
  Apellido: <?=$persona['apellido']?><br><br>
  Fecha de Nacimiento: <?=$persona['fecha_nac']?>
</span>
    </div>
    </div>
    <script type="text/javascript" src="../js/fliplightbox.min.js"></script>
  <script type="text/javascript">$('body').flipLightBox()</script>
  <div class="clear"> </div>
  </div>
  </div>
  </div><br><br><br><br>
</div>
<?php }
                        elseif(isset($_SESSION['proceso']) && $_SESSION['proceso'] == "Salida")
                        { ?>
                      <div class="contenedor" style="display:none;">
        <canvas id="fotoCanvas" ></canvas>
    </div>
            <div id="small-dialog2" class="mfp-hide">
              <div class="pop_up">
                <h2>Registrar Salida</h2>
                <video id="camara" autoplay></video>
                <p class="para"><span id="hmsg"></span></p>
                <br>
                <img id="checkin" title="Aceptar" src="../images/checkin.png" alt="">
              </div>
            </div>
            <div class="wrap" id="portfolio">
        <div class="main">
          <!-- start gallery  -->
              <div class="gallery1">
            <div class="gallery">
          <div class="clear"> </div>
          <div class="container">
            <h2><?=$titulo?></h2>
      <div id="portfoliolist">
      
      <div class="portfolio logo" data-cat="logo" >
        <div class="portfolio-wrapper">       
          <a class="popup-with-zoom-anim" href="#small-dialog1">
            <ul class="ch-grid">
            </ul>
          </a>
        </div>
      </div>    
      <div class="hide">  
      <div class="portfolio web" data-cat="web">
        <div class="portfolio-wrapper">           
          <a class="popup-with-zoom-anim" href="#small-dialog2">
            <ul class="ch-grid">
              <li>
                <div class="ch-item ch-img-6">
                  <div class="ch-info">
                    <img src="../images/zoom-white.png"/>
                    <h3>Registrar salida</h3>
                  </div>
                </div>
              </li>
            </ul>
          </a>
        </div>
      </div>  
      </div>
        
      <div class="portfolio app" data-cat="app">
        <div class="portfolio-wrapper" >      
          <a class="popup-with-zoom-anim" href="#small-dialog1">
            <ul class="ch-grid" >
            </ul>
          </a>
        </div>
      </div>  
      
      <div class="portfolio card" data-cat="card">
        <div class="portfolio-wrapper">     
          <a class="popup-with-zoom-anim" href="#small-dialog1">
            <ul class="ch-grid">
            </ul>
          </a>
        </div>
      </div>  
<form style="display:none;" name="asistenciaEntrada" method="POST" action="../procesos/proceso_asistencia.php">
             <input type="hidden" name="cedula" value="<?=$persona['cedula']?>">
             <input type="hidden" id="foto" name="foto" value="">
           </form>                                                                           
<span>
  Cedula: <?=$persona['cedula']?><br><br>
  Nombre: <?=$persona['nombre']?><br><br>
  Apellido: <?=$persona['apellido']?><br><br>
  Fecha de Nacimiento: <?=$persona['fecha_nac']?>
</span>                                                                                     
    </div>
    </div>
    <script type="text/javascript" src="../js/fliplightbox.min.js"></script>
  <script type="text/javascript">$('body').flipLightBox()</script>
  <div class="clear"> </div>
  </div>
  </div>
  </div><br><br><br><br>
</div>
                      <?php }
                      else
                      { ?>
                    <div class="contact" id="contact">
                      <div class="wrap">
                        <br><br>
                        <h2><?=$titulo?></h2>
                      <div class="section group">
                        <div class="clear"></div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                                <div class="contact-form">
                                  <div class="clear"></div>
                                  <div class="clear"></div>
                      <form method="post" action="../procesos/verificar_asistencia.php">
                            
                                <input type="number" name="cedula" class="textbox" value="" required placeholder="Ingresa tu cedula">
                                <div class="clear"> </div>
                                <div class="clear"> </div>
                          <span><input type="submit" name="search" value="Aceptar"></span>
                          <div class="clear"></div>
                          <div class="clear"></div>
                          <div class="clear"></div>
                          <div class="clear"></div>
                          <div class="clear"></div>
                          <div class="clear"></div>
                          <div class="clear"></div>
                        </form>
                      </div>
                      </div>
                      </div>
                    </div>
                    <?php } ?>
<!---End-gallery--- -->
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
     <script src="../js/jquery.scrollTo.js"></script>
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