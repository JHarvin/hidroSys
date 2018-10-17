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
                    alert(""+data);
                    
                    
                },
                error:function(data){
                    alert("error: "+data);
                    
                }
            });
        }
            

    });
});