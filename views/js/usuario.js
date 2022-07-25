
$(".btnEditarUsuario").click(function(){

var idUsuario = $(this).attr("idUsuario");
console.log(idUsuario);

var datos = new FormData();
datos.append("idUsuario", idUsuario);

$.ajax({
  url:"ajax/usuario.ajax.php",
  method:"POST",
  data: datos,
  cache:false,
  contentType:false,
  processData:false,
  dataType:"json",
  success:function(respuesta){
    console.log("respuesta", respuesta);
    $("#editarNombre").val(respuesta["nombre"]);
    $("#editarUsuario").val(respuesta["usuario"]);
    $("#passwordActual").val(respuesta["password"]);
    $("#idActualUsuario").val(respuesta["id"]);
    
  }
});

});

$(".btnEliminarUsuario").click(function(){

  var idUsuario = $(this).attr("idUsuario");
  console.log(idUsuario);
  
  if(confirm("Estas seguro de Borrar el usuario")){
    window.location = "index.php?ruta=usuario&idUsuario="+idUsuario;
  }
  
  
  
  });
/*
  $(document).ready(function () {
    $('#example').DataTable();
});
*/
$(document).ready(function () {
  $('#example').DataTable({
      ajax: 'ajax/tablaUsuario.ajax.php',
  });
});