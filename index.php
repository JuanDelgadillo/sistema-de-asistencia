<?php  

include_once "config/conection.php";

session_start();

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
				<a href="#">&iquest;Olvidaste tu contrase&ntilde;a?</a>
				<a href="#">Registrarse</a>
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
					<a class="popup-with-zoom-anim" href="#small-dialog1">
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
  <script type="text/javascript">

  window.addEventListener('load',function(){
  	hmsg();
  },false);

  </script>
  				<div id="small-dialog1" class="mfp-hide">
							<div class="pop_up">
								<h2>Registrar entrada</h2>
								<img style="margin-left:10%;" src="images/default-photo.png" alt=""/>
								<p class="para"><span id="hmsg"></span></p>
							</div>
						</div>
						<div id="small-dialog2" class="mfp-hide">
							<div class="pop_up">
								<h2>Registrar Salida</h2>
								<img style="margin-left:10%;" src="images/default-photo.png" alt=""/>
								<p class="para"><span id="hmsg"></span></p>
							</div>
						</div>
<div class="wrap" id="portfolio">
				<div class="main">
					<!-- start gallery  -->
							<div class="gallery1">
						<div class="gallery">
					<div class="clear"> </div>
					<div class="container">
						<h2>Control de asistencia</h2>
			<div id="portfoliolist">
			
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a class="popup-with-zoom-anim" href="#small-dialog1">
						<ul class="ch-grid">
						</ul>
					</a>
				</div>
			</div>		
				
			<div class="portfolio app" data-cat="app">
				<div class="portfolio-wrapper">			
					<a class="popup-with-zoom-anim" href="#small-dialog1">
						<ul class="ch-grid">
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
<!-----start-about------ 

<div class="about" id="about">
	<div class="wrap">
	<h2>About US</h2>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		<div class="about-grids">
			<div class="grid">
				<div class="dc_zoom_css">
				<span class="roll_css6">
					<div class="social">
						<ul>
							<li><a class="sharefacebook" href="#"> </a> </li>
							<li><a class="sharetwitter" href="#"> </a> </li>
							<li><a class="sharetgoogle" href="#"> </a> </li>
							<li><a class="sharedrible" href="#"> </a> </li>
							<div class="clear"> </div>
						</ul>
					</div>
				</span>
				<img class="post-person" src="images/img1.jpg">
				</div>
				<div class="desc">
					<h3>Lorem Ipsum is Simply</h3>
					<p>project manager</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Sed ut perspiciatis unde omnis iste natus error sit voluptatem,Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
				</div>
		
			</div>
			<div class="grid">
				<div class="dc_zoom_css">
				<span class="roll_css6">
					<div class="social">
						<ul>
							<li><a class="sharefacebook" href="#"> </a> </li>
							<li><a class="sharetwitter" href="#"> </a> </li>
							<li><a class="sharetgoogle" href="#"> </a> </li>
							<li><a class="sharedrible" href="#"> </a> </li>
							<div class="clear"> </div>
						</ul>
					</div>
				</span>
				<img class="post-person" src="images/img2.jpg">
				</div>
				<div class="desc">
					<h3>Lorem Ipsum is Simply</h3>
					<p>project manager</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Sed ut perspiciatis unde omnis iste natus error sit voluptatem,Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
				</div>
			</div>
			<div class="grid">
				<div class="dc_zoom_css">
				<span class="roll_css6">
					<div class="social">
						<ul>
							<li><a class="sharefacebook" href="#"> </a> </li>
							<li><a class="sharetwitter" href="#"> </a> </li>
							<li><a class="sharetgoogle" href="#"> </a> </li>
							<li><a class="sharedrible" href="#"> </a> </li>
							<div class="clear"> </div>
						</ul>
					</div>
				</span>
				<img class="post-person" src="images/img3.jpg">
				</div>
				<div class="desc">
					<h3>Lorem Ipsum is Simply</h3>
					<p>project manager</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Sed ut perspiciatis unde omnis iste natus error sit voluptatem,Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
				</div>
			</div>
			<div class="clear"> </div>
		</div>
	</div>
</div>-->
<!---------end-about----------- 
<div class="contact" id="contact">
	<div class="wrap">
		<h2>Contact Us</h2>
		<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
		<div class="section group">
			  <div class="col span_2_of_3">
				  <div class="contact-form">
				  	  <form method="post" action="#">
					    	
					    		<input type="text" class="textbox" value="Your Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your  Name';}">
						    	<input type="text" class="textbox" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}">
						    	<div class="clear"> </div>
						   
						    <div>
						    	<textarea value="Your Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Message';}">Your Message...</textarea>
						    </div>
						  <span><input type="submit" class="" value="Submit"></span>
						  <div class="clear"></div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="company_address">
				     	<h5>INFORMATION</h5>
						<ul class="list3">
							<li>
								<img src="images/location.png" alt=""/>
								<div class="extra-wrap">
								  <p>Lorem ipsum  consectetu</p>
								  <p>12345-Lorem ipsum  consectetu</p>
								  <p>Lorem ipsum , consectetu</p>
								</div>
								<div class="clear"> </div>
							</li>
							
							<li>
								<img src="images/phone.png" alt=""/>
								<div class="extra-wrap">
									<p>+1 800(Phone) 258 2598</p>
								</div>
								<div class="clear"> </div>
							</li>
							<li>
								<img src="images/fax2.png" alt=""/>
								<div class="extra-wrap">
									<p>+1 500(Tax) 6343 8690</p>
								</div>
								<div class="clear"> </div>
							</li>
							<li>
								<img src="images/mail.png" alt=""/>
								<div class="extra-wrap">
									<p> <a href="mailto:info@mycompany.com"> info(at)appstore.com</a></p>
								</div>
								<div class="clear"> </div>
							</li>
						</ul>
				   </div>
				 </div>
				 <div class="clear"></div>
			  </div>
			  </div>
     	</div> -->
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