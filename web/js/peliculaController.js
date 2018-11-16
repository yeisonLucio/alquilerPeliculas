$(document).ready(function(){

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
    alert("click");
    
  });

  $('.login').click(function(){
    console.log("voy a cargar la vista login");
    $("#contenedor").load('usuario/login #contenedor_login');
    
  });

  $("#contenedor").on("click","#btn_registrarUsuario",function(e){
    
    
    registrarUsuario();

    
    
    
  });
  
});

/////////////////////////////////////////////////////////////
function ingresarPelicula($id){
  console.log("ingresar pelicula");
  $("#contenedor").load('/pelicula/'+$id+' #contenidoPelicula');
  console.log("ingresar pelicula2");
}

function registrarUsuario(){
  $( "#formRegistroUsuario").submit(function(e) {
    e.preventDefault();
    var data = $(this).serialize();
    //$.ajax({
      //type: "POST",


//    }).success(function(resultado){

  //  });
  });


}
