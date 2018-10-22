$(document).ready(function(){


    $("#departamento").on("change", function(){

        var depto = $("#departamento").val();

        if(depto != ""){
            $.ajax({
                type:'POST',
                url: '../Controladores/datosDePozos/extraerMunicipios.php',
                data:{depto:depto},
                success:function(data){
                    if(data!= 0){
                        $("#municipio").html(data);
                    }
                    else{
                        $("#municipio").html("<option value='0' >No hay municipios para el departamento</option>");
                    }
                    
                },
                error:function(data){
                    alert("error: "+data);
                    
                }
            });//fin del ajax
        }//fin del if
            

    });//fin del evento change
});