  $(buscar_datos());
  function buscar_datos(consulta){
   $ajax({
       url:'BuscarProducto.php',
       type:'POST',
       dataType:'html',
       data: {consulta:consulta},
            
   })
           .done(function(respuesta){
             $('#clase1').html(respuesta);
           })
                   .fail(function(){
                       console.log("error");
                   })
  }
  
  
$(document).on('keyup','#bus',function(){
    var valor = $(this).val();
    
    if (valor!="") {
        buscar_datos(valor);
    }else{
        buscar_datos();
    }
});