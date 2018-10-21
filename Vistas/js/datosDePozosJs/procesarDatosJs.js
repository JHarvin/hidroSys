$(document).ready(function(){


   $("#guardar").on('click', function(){

    var codigo = $('#codigo').val();
    var depto = $('#departamento').val();
    var municipio = $('#municipio').val();
    var tipo = $('#tipo').val();
    var latitud = $('#latitud').val();
    var longitud = $('#longitud').val();
    var altura = $('#altura').val();
    var nivel = $('#nivel').val();
    var profundidad = $('#profundidad').val();
    var fecha = $('#fecha').val();
    var propietario = $('#propietario').val();
    var estado = $('#estado').val();
    var geologia = $('#geologia').val();
    var observacion = $('#observacion').val();

    codigo ="ING2018"; //temporal mientras se hace el metodo de generar codigo
        
    if(codigo == ""){
        alert("");
        return false;
    }
    if(depto == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(municipio == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(tipo == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(latitud == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(longitud == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(altura == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(nivel == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(profundidad == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(fecha == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(propietario == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
   

    $.ajax({
        type: 'POST',
        url: '../Controladores/datosDePozos/almacenarDatos.php',
        data: {codigo:codigo, depto:depto, municipio:municipio, tipo:tipo, latitud:latitud,
        longitud:longitud, altura:altura, nivel:nivel, profundidad:profundidad, fecha:fecha, 
        propietario:propietario, estado:estado, geologia:geologia, observacion:observacion},
        success: function(respuesta) {
            
            if(respuesta==1){
                alert("Se agrego correctamente "+respuesta);
                $(".tabla_ajax").load("../Vistas/tablaDatosPozos.php");
                $("#formPozos")[0].reset();
            }
            if(respuesta==2){
                alert("No se pudieron agregar los datos "+respuesta);
            }
            if(respuesta==3){
                alert("Las coordenadas ya existen "+respuesta);
            }
        },
        error: function(respuesta){
            alert("Error en el servidor "+respuesta);
        }
    });//fin de ajax


    return false;
   });//fin del click

   $("#iframe").contents().find("#obtener").on("click", function(){
         var latitud = $("#iframe").contents().find("#coordsLa").val();
         var longitud = $("#iframe").contents().find("#coordsLo").val();

         if(latitud != "" && longitud != ""){
            $(".modal").modal("hide");
         }
         
       
   });//letura del inframe del mapa


   
});

function detalle(codigo, depto,nombreProp,nombreMuni,altura,profundidad,nivel,fecha,dui,tipo,estado,geologia,observacion){

    $("#cod").text(codigo);
    $("#dep").text(depto);
    $("#mun").text(nombreMuni);
    $("#prop").text(dui+" "+nombreProp);
    $("#alt").text(altura+" mtrs");
    $("#niv").text(nivel+" mtrs");
    $("#prof").text(profundidad+" mtrs");
    $("#fech").text(fecha);
    $("#tip").text(tipo);

    if(estado == 1){
        $("#est").text("EN USO");
    }else{
        $("#est").text("INACTIVO");
    }
    $("#geolo").val(geologia);
    $("#observa").val(observacion);

    $(".detalle-modal-lg").modal();
}

function ubicacion(latitud, longitud, codigo){

    var ruta = "verMapaPozo.php?lat="+latitud+"&lon="+longitud;

    $("#ubi").text(codigo);
    
    $("#iframe2").prop("src", ruta);//si me costo llegar a esta mierda jaja XD

    $(".ubicacion-modal-lg").modal();
    
}