$(document).ready(function(){


    $("#departamento").on("change", function(){

        var depto = $("#departamento").val();
        alert("llega");
        if(depto != ""){
            alert("llega");
            $.ajax({
                type:'POST',
                url: '../Controladores/datosDePozos/extraerMunicipios.php',
                data:{depto:depto},
                success:function(data){
                    if(data!= 0){
                        $("#municipio").html(data);
                        alert(data);
                    }
                    else{
                        $("#municipio").html("<option value=''>No hay municipios para el departamento</option>");
                    }
                    
                },
                error:function(data){
                    alert("error: "+data);
                    
                }
            });
        }
            

    });
});