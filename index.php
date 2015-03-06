<?php  

include_once "config/conection.php";

session_start();
if(isset($_SESSION['user']) && $_SESSION['rol'] != 1)
{
	$fecha = date("Y-m-d");
	$cedula = $_SESSION['cedula_user'];
	$rol = $_SESSION['rol'];
	$verificar_asistencia = mysql_query("SELECT * FROM asistencia, persona, roles WHERE asistencia.cedula = '$cedula' AND asistencia.fecha = '$fecha' AND asistencia.cedula = persona.cedula AND roles.rol = $rol ");
	$persona = mysql_fetch_assoc($verificar_asistencia);

	if($persona['verificacion_entrada'] == "Inasistente")
    {
        $_SESSION['asistencia_user'] = "Entrada";
    }
    else if($persona['verificacion_salida'] == "Inasistente")
    {
        $_SESSION['asistencia_user'] = "Salida";
    }
    else
    {
        $_SESSION['asistencia_user'] = "Registrada";
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sistema de asistencia</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'> -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/imgeffect.css" />
<script src="js/jquery.min.js"></script>
<!-- start gallery Script -->
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>	
	<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
	<script type="text/javascript" src="js/hms.js"></script>
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
				<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
				<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
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
				<script type="text/javascript" src="js/move-top.js"></script>
				<script type="text/javascript" src="js/easing.js"></script>
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
								<a href="./"><img src="images/logo.png" width="222px" height="58px" alt="" /></a>
							</div>	
							<span id="titulo">U. E. Gabriela Mistral</span>
							<!--------end-logo------- -->
							<!----start-nav------ -->	
							<div class="nav">
								<ul>
								   <li class="active"><a href="./" >Inicio</a></li>
								   <?php  

            if(isset($_SESSION['user']))
            {
              ?>
								   <li><a href="modulos/user.php" ><?=$_SESSION['user']?></a></li>
								   <li class="close"><a href="procesos/salir.php" >Cerrar sesión</a></li>
			<?
            }else{

            ?>
            					<li ><a href="modulos/asistencia.php" >Asistencia</a></li>
            					<?php } ?>
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
<?php  

if(! isset($_SESSION['user']))
{
  ?>
						<div class="da-slide">
								<h2><span>Control de acceso</span></h2>
								<!--
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.  when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									<a href="#" class="da-link">Learnmore</a>
									<a href="#portfolio" class="scroll"><span class="da-img"> </span> </a>
								-->
				<section id="login">
				<form method="POST" action="procesos/login.php" accept-charset="UTF-8">
				<h1> Iniciar sesión </h1>
				<div>
				<input id="username" placeholder="Usuario" autocomplete="off" required="required" name="user" type="text">
			</div>
			<div>
				<input id="password" placeholder="Contrase&ntilde;a" required="required" name="contrasena" type="password" value="">
			</div>
			<div>
				<input type="submit" name="ingresar" value="Iniciar Sesi&oacute;n">
			</div>
		</form><!-- form -->
	</section>
				</div>
				<!---//End-da-slider--- -->
 <?
}

?>						

		</div>
</div>
<!-----end-slider------ -->
<?php  

if(isset($_SESSION['user']) && $_SESSION['rol'] == 1)
{
  ?>
<!--start portfolio---- -->
	<div class="wrap" id="portfolio">
				<div class="main">
					<!-- start gallery  -->
							<div class="gallery1">
					<!--start-mfp -->
						
					<!--end-mfp -->	
			<!---start-content--- -->
			<div class="gallery">
					<div class="clear"> </div>
					<div class="container">
						<h2>Panel de control</h2>
			<div id="portfoliolist">
			
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a href="modulos/registro_personal.php">
						<ul class="ch-grid">
							<li>
								<div class="ch-item ch-img-1">
									<div class="ch-info">
										<img src="images/zoom-white.png"/>
										<h3>Registro del personal</h3>
									</div>
								</div>
							</li>
						</ul>
					</a>
				</div>
			</div>		
				
			<div class="portfolio app" data-cat="app">
				<div class="portfolio-wrapper">			
					<a class="popup-with-zoom-anim" href="#small-dialog2">
						<ul class="ch-grid">
							<li>
								<div class="ch-item ch-img-2">
									<div class="ch-info">
										<img src="images/zoom-white.png"/>
										<h3>Reportes</h3>
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
					<a href="modulos/gestion-users.php">
						<ul class="ch-grid">
							<li>
								<div class="ch-item ch-img-3">
									<div class="ch-info">
										<img src="images/zoom-white.png"/>
										<h3>Gestión de usuarios</h3>
									</div>
								</div>
							</li>
						</ul>
					</a>
				</div>
			</div>	
			</div>
			
			<div class="portfolio card" data-cat="card">
				<div class="portfolio-wrapper">			
					<a href="modulos/auditoria.php">
						<ul class="ch-grid">
							<li>
								<div class="ch-item ch-img-4">
									<div class="ch-info">
										<img src="images/zoom-white.png"/>
										<h3>Auditoría</h3>
									</div>
								</div>
							</li>
						</ul>
					</a>
				</div>
			</div>	
																																											
		</div>
		</div>
	</div> <!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
	</div>
	</div>
	</div><br><br><br><br>
</div>
<?php  
}
elseif(isset($_SESSION['user']) && $_SESSION['rol'] != 1)
{
  ?>
  <script type="text/javascript" src="js/camara.js"></script>
  				<div id="small-dialog1" class="mfp-hide">
							<div class="pop_up">
								<h2>Registrar entrada</h2>
								<video id="camara" autoplay></video>
								<p class="para"><span id="hmsg"></span></p>
								<br>
                				<img id="checkin" title="Aceptar" src="images/checkin.png" alt="">
							</div>
						</div>
						<div id="small-dialog2" class="mfp-hide">
							<div class="pop_up">
								<h2>Registrar Salida</h2>
								<video id="camara" autoplay></video>
								<p class="para"><span id="hmsg"></span></p>
								<br>
                				<img id="checkin" title="Aceptar" src="images/checkin.png" alt="">
							</div>
						</div>
<div class="wrap" id="portfolio">
				<div class="main">
					<!-- start gallery  -->
							<div class="gallery1">
						<div class="gallery">
					<div class="clear"> </div>
					<div class="container">
					<div class="contenedor" style="display:none;">
				        <canvas id="fotoCanvas" ></canvas>
				    </div>
						<h2><?php if($_SESSION['asistencia_user'] == "Entrada" || $_SESSION['asistencia_user'] == "Salida"){
							echo "Control de asistencia";
						}else{
							echo "Asistencia del día registrada";
						} ?></h2>
			<div id="portfoliolist">
			
			<div class="portfolio logo" data-cat="logo" >
				<div class="portfolio-wrapper">				
					<a class="popup-with-zoom-anim" href="#small-dialog1">
						<ul class="ch-grid">
						</ul>
					</a>
				</div>
			</div>		
				<?php
				if($_SESSION['asistencia_user'] == "Entrada")
				{
				?>
			<div class="portfolio app" data-cat="app">
				<div class="portfolio-wrapper" >			
					<a class="popup-with-zoom-anim" href="#small-dialog1">
						<ul class="ch-grid" >
							<li>
								<div class="ch-item ch-img-5">
									<div class="ch-info">
										<img src="images/zoom-white.png"/>
										<h3>Registrar entrada</h3>
									</div>
								</div>
							</li>
						</ul>
					</a>
				</div>
			</div>
			<form style="display:none;" name="asistenciaEntrada" method="POST" action="procesos/proceso_asistencia.php">
		        <input type="hidden" name="cedula" value="<?=$persona['cedula']?>">
		        <input type="hidden" id="foto" name="foto" value="">
		        <input type="hidden" name="proceso" value="Entrada">
		    </form>  
			<?php } 
				if($_SESSION['asistencia_user'] == "Salida")
				{
				?>	
			<div class="hide">	
			<div class="portfolio web" data-cat="web">
				<div class="portfolio-wrapper">						
					<a class="popup-with-zoom-anim" href="#small-dialog2">
						<ul class="ch-grid">
							<li>
								<div class="ch-item ch-img-6">
									<div class="ch-info">
										<img src="images/zoom-white.png"/>
										<h3>Registrar salida</h3>
									</div>
								</div>
							</li>
						</ul>
					</a>
				</div>
			</div>	
			</div>
			<form style="display:none;" name="asistenciaEntrada" method="POST" action="procesos/proceso_asistencia.php">
		        <input type="hidden" name="cedula" value="<?=$persona['cedula']?>">
		        <input type="hidden" id="foto" name="foto" value="">
		        <input type="hidden" name="proceso" value="Salida">
		    </form>  
			<?php }
			if($_SESSION['asistencia_user'] == "Registrada")
			{
			 ?>
			 <div class="hide">	
			<div class="portfolio web" data-cat="web">
				<div class="portfolio-wrapper">						
					<a href="#">
						<ul class="ch-grid">
							<li>
								<div class="ch-item ch-img-7">
									<div class="ch-info">
										<img src="images/zoom-white.png"/>
										<h3>Asistencia del día registrada</h3>
									</div>
								</div>
							</li>
						</ul>
					</a>
				</div>
			</div>	
			</div>
			 <?php } ?>
<div>
	<br><br>
  Cedula: <?=$persona['cedula']?><br><br>
  Nombre: <?=$persona['nombre']?><br><br>
  Apellido: <?=$persona['apellido']?><br><br>
  Fecha de Nacimiento: <?=$persona['fecha_nac']?><br><br>
  Categoria: <?=$persona['nombre_rol']?>
</div>
			
			<div class="portfolio card" data-cat="card">
				<div class="portfolio-wrapper">			
					<a class="popup-with-zoom-anim" href="#small-dialog1">
						<ul class="ch-grid">
						</ul>
					</a>
				</div>
			</div>	
																																											
		</div>
		</div>
		<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
	</div>
	</div>
	</div><br><br><br><br>
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
		 <script src="js/jquery.scrollTo.js"></script>
		</div>
	</div>
<?php 

if(isset($_SESSION['menssage']) && $_SESSION['menssage'] != "")
{

  printf("<script type='text/javascript' language='javascript'>
window.addEventListener('load',function(){
  alert('".$_SESSION['menssage']."');
	
},false);

    </script>");

  unset($_SESSION['menssage']);
}

if(isset($_SESSION['proceso']) && isset($_SESSION['cedula_persona']))
{
	unset($_SESSION['proceso']);
    unset($_SESSION['cedula_persona']);
}
 ?>
</body>
</html>