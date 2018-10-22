$(document).ready(function(){


    $("#departamento").on("change", function(){

        var depto = $("#departamento").val();

        if(depto != "0"){
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

    $("#municipio").on('change', function(){

        var depa = $("#departamento").val();
        var depaText = $("#departamento").text();
        var text1 = depaText.substring(1,2);
        if(depa != 0){

           var muni = $("#municipio").val();
           var muniText = $("#municipio").text();
           var text2 = muniText.substring(1,2);
            var aux= text1+"-"+depa+"-"+text2+"-"+muni;
           $("#codigo").val(aux);
        }

    });//fin del segundo change
});