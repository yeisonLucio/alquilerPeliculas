$(function(){

  $('.sidenav').sidenav();

  $('.inicio').click(function(){
    console.log("voy a cargar la vista inicio");
    $("#contenedor").load('/ #contenedor_inicio');

  });

  $('.peliculas').click(function(){
    console.log("voy a cargar la vista pelicula");
    var ruta = "{{ path('listaPeliculas') }} ";
    $("#contenedor").load("{{ path('listaPeliculas') }} ");


  });

  $('.series').click(function(){
    console.log("voy a cargar la vista login");
    $("#contenedor").load('/series #contenedor_login');

  });

  $('.registro').click(function(){
    console.log("voy a cargar la vista registro");
    $("#contenedor").load('/usuario/registro #contenedor_registro');

  });

  $('.login').click(function(){
    console.log("voy a cargar la vista login");
    $("#contenedor").load('usuario/login #contenedor_login');

  });

  $("#contenedor").on("submit","#formRegistroUsuario",function(e){
    e.preventDefault();
    $("#preload").addClass("active");
    var data = $(this).serialize();
    registrar("/usuario/registro",data);
  });

});

/////////////////////////////////////////////////////////////
function ingresarPelicula($id){
  console.log("ingresar pelicula");
  $("#contenedor").load('/pelicula/'+$id+' #contenidoPelicula');
  console.log("ingresar pelicula2");
}

function registrar($url,$data){

  $.ajax({
    type: "POST",
    url: $url,
    data: $data,
    success: function(resultado){
      $.each(resultado, function(key,value){
        $("#preload").removeClass("active");
        var alert="<div><span><i class='small material-icons right'>error</i>"+value+"</span></div>"
        M.toast({html: alert, classes: "red darken-4 white-text"});

      });
    }
  });
}
