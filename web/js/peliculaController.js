$(function(){
    $('.sidenav').sidenav();
    $('#li_login').click(function(){
       console.log("voy a cargar la vista login");
      $("#contenedor").load('/login');
    });
    $('#li_peliculas').click(function(){
      console.log("voy a cargar la vista login");
     $("#contenedor").load('/');
   });
  
  });