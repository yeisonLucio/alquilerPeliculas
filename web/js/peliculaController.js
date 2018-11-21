$(function(){

  $('.sidenav').sidenav();

  $('.inicio').click(function(){
    console.log("voy a cargar la vista inicio");
    $("#contenedor").load('/ #contenedor_inicio');

  });

  $('.peliculas').click(function(){
    console.log("voy a cargar la vista pelicula");
    $("#contenedor").load('pelicula/listaPeliculas #contenedor_pelicula');


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
    var data = $(this).serialize();
    $.ajax({
    type: "POST",
    url: "usuario/registro",
    data: data,
    success: function(resultado){
      console.log(resultado);
      $.each(resultado, function(key,value){
        M.toast({html: ""+value, classes: "red darken-3 white-text"});

      });
    }
  });

//    registrarUsuario(");



  });

});

/////////////////////////////////////////////////////////////
function ingresarPelicula($id){
  console.log("ingresar pelicula");
  $("#contenedor").load('/pelicula/'+$id+' #contenidoPelicula');
  console.log("ingresar pelicula2");
}

// function registrarUsuario($url){
//   $( "").(function(e) {
//     e.preventDefault();
//
//
//
//
//
//
//     }
//     });
//   });
