window.addEventListener('load',function(){
    hmsg();
    var capturar_entrada = function(){

    }

    jQuery('.popup-with-zoom-anim').on('click', function(e){
                                setTimeout(function(){
                                             //Nos aseguramos que estén definidas
//algunas funciones básicas
window.URL = window.URL || window.webkitURL;
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || function(){alert('Su navegador no soporta navigator.getUserMedia().');};
 
jQuery(document).ready(function(){
    //Este objeto guardará algunos datos sobre la cámara
    window.datosVideo = {
        'StreamVideo': null,
        'url' : null
    };
    var fotografia = document.getElementById('foto');
    navigator.getUserMedia({'audio':false, 'video':true}, function(streamVideo){
            datosVideo.StreamVideo = streamVideo;
            datosVideo.url = window.URL.createObjectURL(streamVideo);
            jQuery('#camara').attr('src', datosVideo.url);
        }, function(){
            alert('No fue posible obtener acceso a la cámara.');
        });
 
    jQuery('#botonDetener').on('click', function(e){
        if(datosVideo.StreamVideo){
            datosVideo.StreamVideo.stop();
            window.URL.revokeObjectURL(datosVideo.url);
        };
    });

    jQuery('#checkin').on('click', function(e){
    var oCamara, 
        oFoto,
        oContexto,
        w, h;
         
    oCamara = jQuery('#camara');
    oFoto = jQuery('#fotoCanvas');
    w = oCamara.width();
    h = oCamara.height();
    oFoto.attr({'width': w, 'height': h});
    oContexto = oFoto[0].getContext('2d');
    oContexto.drawImage(oCamara[0], 0, 0, w, h); 

//Obtienes el contexto del canvas, y lees la imagen codificada en Base64:
var oContexto = document.getElementById("fotoCanvas");
fotografia.value = oContexto.toDataURL("image/png");
document.asistenciaEntrada.submit();
//Envías la imagen como un post normal a una página ASP, PHP, servicio web, etc.
/*
jQuery.ajax({
url: "proceso.php",
type: "post",
data: oData
});*/
 
});







});
    },500);
});
  },false);