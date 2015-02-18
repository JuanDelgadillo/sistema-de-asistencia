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
<script src="../js/fecha.js"></script>
<style>
    .contact-form input[type="text"], .contact-form input[type="email"] {
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
    <script>

    window.addEventListener('load',function(){
        var loads_attributes = function(fields, methods, value)
        {
            for(x in fields)
            {
                field = eval(fields[x]);
                if(methods == 'required')
                    field.required = value;
                else if(methods == 'display')
                    field.style.display = value;

            }
        }

        categoria.addEventListener('change',function(){
            var textos_administrativo = Array('especialidad_texto','area_texto');
            var campos_administrativo = Array('especialidad_campo','area_campo');
            var textos_docente = Array('especialidad_texto','asignatura_texto');
            var campos_docente = Array('especialidad_campo','asignatura_campo');
            var textos_obrero = Array('area_texto');
            var campos_obrero = Array('area_campo');

            if(categoria.value == "Administrativo")
            {   
                loads_attributes(campos_administrativo, 'required', true);
                loads_attributes(['asignatura_texto','asignatura_campo'], 'required', false);
                loads_attributes(textos_administrativo, 'display', 'inline');
                loads_attributes(campos_administrativo, 'display', 'inline');
                loads_attributes(['asignatura_texto','asignatura_campo'], 'display', 'none');
            }
            else if(categoria.value == "Docente")
            {
                loads_attributes(campos_docente, 'required', true);
                loads_attributes(['area_texto','area_campo'], 'required', false);
                loads_attributes(textos_docente, 'display', 'inline');
                loads_attributes(campos_docente, 'display', 'inline');
                loads_attributes(['area_texto','area_campo'], 'display', 'none');
            }
            else if(categoria.value == "Obrero")
            {
                loads_attributes(campos_obrero, 'required', true);
                loads_attributes(textos_obrero, 'display', 'inline');
                loads_attributes(campos_obrero, 'display', 'inline');
                loads_attributes(['especialidad_texto','especialidad_campo','asignatura_texto','asignatura_campo'], 'display', 'none');
                loads_attributes(['especialidad_texto','especialidad_campo','asignatura_texto','asignatura_campo'], 'required', false);
            }
            else
            {
                loads_attributes(['especialidad_texto','especialidad_campo','asignatura_texto','asignatura_campo','area_texto','area_campo'], 'display', 'none');
            }

        },false);
    },false);

    </script>
    <div class="wrap">
        <h2>Registro del personal</h2>
        <div class="section group">
                  <div class="contact-form">
        <form name="singup_inventario" method="POST" action="../procesos/registro_personal.php">
            <p class="titulos"><span>Cedula</span> <span style="margin-left:23.8%;">Nombre</span><span style="margin-left:23.3%;">Apellido</span></p>
            <input type="text" name="cedula" value="" placeholder="Cedula" required />
            <input type="text" name="nombre" class="textbox" value="" placeholder="Nombre" required />
            <input type="text" name="apellido" class="textbox" value="" placeholder="Apellido" required />

            <div class="clear"> </div>
            <div class="clear"> </div>
            <p class="titulos"><span>Sexo</span> <span style="margin-left:25%;">Fecha de Nacimiento</span><span style="margin-left:15%;">Categoría</span></p>
              <select class="sexo" name="sexo" required>
                <option value="">- Sexo -</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
              </select>
            <select style="width:7%;" name="dia_nac" required>
                                    <option value=" ">D&iacute;a</option>
                                </select>

                                <select style="width:12%;" name="mes_nac" onchange="d_m_fnac();" required>
                                    <option value="0">Mes</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option></select>
                                <select style="width:7%;margin-right: 2em;" name="ano_nac" onchange="d_m_fnac();" required>
                                    <option value="">Año</option>
                                    <?php for($x = 2015; $x > 1940; $x--){ ?>
                                    <option value="<?=$x?>" ><?=$x?></option>
                                    <?php } ?>
                                </select>
                    <select class="sexo" id="categoria" name="categoria" required>
                <option value="">- Categoría -</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Docente">Docente</option>
                <option value="Obrero">Obrero</option>
              </select>
            <div class="clear"> </div>
            <div class="clear"> </div>
           <p class="titulos"><span>Turno</span><span style="margin-left:24.8%;">Grado de instrucción</span><span style="margin-left:15%;display:none;" id="area_texto">Área</span><span id="asignatura_texto"  style="margin-left:15%;display:none;">Asignatura</span></p>
           <select class="sexo" name="turno" required>
                <option value="">- Turno -</option>
                <option value="Mañana">Mañana</option>
                <option value="Tarde">Tarde</option>
              </select>
            <input type="text" name="grado_instruccion" value="" placeholder="Grado de instruccion" required />
              <input type="text" id="area_campo" style="display:none;" name="area" value="" placeholder="Área" required />
            <input type="text" name="asignatura"  style="display:none;" id="asignatura_campo" value="" placeholder="Asignatura" required />
            
            <div class="clear"> </div>
            <div class="clear"> </div>
            <p class="titulos"><span id="especialidad_texto" style="display:none;">Especialidad</span></p>
              <input type="text" name="especialidad"  style="display:none;" id="especialidad_campo" value="" placeholder="Especialidad" required />
              
              
            
            <div class="clear"> </div>
            <div class="clear"> </div>
            
            <span><input class="submit" type="submit" name="aceptar" value="Aceptar" /></span>
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