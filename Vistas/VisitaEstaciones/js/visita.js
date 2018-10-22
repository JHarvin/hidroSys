function cancelar(){
    var observacion = $("#observacion").val();
    var visitante = $("#visitante").val();
    var estacion = $("#estacion").val();
    var tipo = $("#tipo").val();
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    
    var confirmar = alertify.confirm("<center>ATENCI&Oacute;N!</center>", 
    "<center><h2>Desea cancelar el registro?</h2></center>",null,null).set('labels', {ok:'Si', cancel:'Cancelar'});  
          
    confirmar.set('notifier','position','top-right');
    confirmar.set({transition:'zoom'});    
               
    confirmar.set('onok', function(){ 
        alertify.success('Has confirmado');

        $("#observacion").val(""); 
        $("#visitante").select2({
            placeholder: "Visitante",
            allowClear: true
        });
        $("#visitante").val("Visitante").trigger('change');

        $("#estacion").select2({
            placeholder: "Estaciones",
            allowClear: true
        });
        $("#estacion").val("Estaciones").trigger('change');

        $("#tipo").select2({
            placeholder: "Tipo Visitante",
            allowClear: true
        });
        $("#tipo").val("Tipo Visitante").trigger('change');
    });

    alertify.set('notifier','position','top-right');         
    confirmar.set('oncancel', function(){ 
      alertify.error('No');
    });
}
    
    function enviarDatos(e) {
      var observacion = $("#observacion").val();
      var visitante = $("#visitante").val();
      var estacion = $("#estacion").val();
      var tipo = $("#tipo").val();

      

      if(visitante=="Visitante" && estacion =="Estaciones" && observacion =="" && tipo =="Tipo Visitante"){
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        alertify.error('Debe Seleccionar un Visitante');
        alertify.error('Debe Seleccionar una Estación');
        alertify.error('Debe Introducir una Observación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if( tipo =="Tipo Visitante" && visitante=="Visitante" && estacion =="Estaciones"  ){
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        alertify.error('Debe Seleccionar una Visitante');
        alertify.error('Debe Seleccionar una Estación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if( tipo =="Tipo Visitante" && visitante=="Visitante" && observacion ==""  ){
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        alertify.error('Debe Seleccionar una Visitante');
        alertify.error('Debe Introducir una Observación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if( estacion =="Estaciones"  && tipo == "Tipo Visitante" && observacion=="" ){
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        alertify.error('Debe Introducir una Observación');
        alertify.error('Debe Seleccionar una Estación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if( estacion =="Estaciones"  && visitante =="Visitante" && observacion=="" ){
        alertify.error('Debe Seleccionar un Visitante');
        alertify.error('Debe Introducir una Observación');
        alertify.error('Debe Seleccionar una Estación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if(visitante =="Visitante"  && tipo =="Tipo Visitante" ){
        //alertify.error('Debe Seleccionar una Visitante');
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      }else if(visitante =="Visitante"  && estacion =="Estaciones" ){
        alertify.error('Debe Seleccionar una Visitante');
        alertify.error('Debe Seleccionar una Estación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if(visitante =="Visitante" && observacion =="" ){
        alertify.error('Debe Seleccionar un Visitante');
        alertify.error('Debe Introducir una Observación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if(tipo =="Tipo Visitante" && observacion =="" ){
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        alertify.error('Debe Introducir una Observación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if(estacion =="Estaciones" && observacion =="" ){
        alertify.error('Debe Seleccionar una Estación');
        alertify.error('Debe Introducir una Observación');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if(estacion =="Estaciones" && tipo =="Tipo Visitante" ){
        alertify.error('Debe Seleccionar una Estación');
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        alertify.set('notifier','position','top-right');
        alertify.set({transition: 'zoom'});
              
        return false;
      } else if (visitante == "Visitante") {
        alertify.set('notifier','position','top-right');
        alertify.error('Debe Seleccionar un Visitante');
        $("#Visitante").focus();
        return false;
      } else if (estacion == "Estaciones") {
        alertify.set('notifier','position','top-right');
        alertify.error('Debe Seleccionar una Estación');
        $("#estacion").focus();
        return false;
      } else if (observacion == "") {
        alertify.set('notifier','position','top-right');
        alertify.error('Debe Introducir una Observación');
        $("#observacion").focus();
        return false;
      } else if (tipo == "Tipo Visitante") {
        alertify.set('notifier','position','top-right');
        alertify.error('Debe Seleccionar un Tipo de Visitante');
        $("#tipo").focus();
        return false;
      }


      
      var obtener = $("#frmvis").serialize();

      $.ajax({
        type: "POST",
        url: "service.php",
        data: obtener,
        success: function(respuesta) {
          if(respuesta==1){
            
            alertify.set('notifier','position','top-right');
            alertify.success('Datos Insertados!'); 
              
            
            limpiaF('limpiar');
            recargarTabla('');
          /* 

            $("#visitante").select2({
                placeholder: "Visitante",
                allowClear: true
            });

            $("#visitante").val("Visitante").trigger('change');

            $("#estacion").select2({
                placeholder: "Estaciones",
                allowClear: true
            });

            $("#estacion").val("Estaciones").trigger('change');
           
            $("#observacion").val(""); 
            
            $("#tipo").select2({
                placeholder: "Tipo Visitante",
                allowClear: true
            });

            $("#tipo").val("Tipo Visitante").trigger('change');*/
            
          }else{
            alertify.set('notifier','position','top-right');
            alertify.error('Datos no insertados!');
            alertify.error('Verifique la información!');  
          }
        }
      }); 
      return false; 

    } 

   

    function verMas(str, opcion) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargaDetalle").innerHTML = xmlhttp.responseText;
                }
            }
            
            xmlhttp.open("post", "cargaModalDetalleVisita.php?idd=" + opcion , true);
            xmlhttp.send();
        }

    function actualiza(opcion) {
        var cambio = document.getElementById('tipo').value;
        var cambioF = document.getElementById('estacion').value
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (opcion === 'cambioTipo') {
                    document.getElementById("visitante").innerHTML = xmlhttp.responseText;
                    document.getElementById("visitante").value = "";
                } else if (opcion === 'cambioFoto') {
                    document.getElementById("imagen").innerHTML = xmlhttp.responseText;
                    document.getElementById("imagen").value = "";
                } 
            }
        }
        
        if (opcion === "cambioTipo") 
            xmlhttp.open("post", "tipoVisit.php?opcion=" + opcion + "&cambio=" + cambio, true);
        else if(opcion === "cambioFoto")
            xmlhttp.open("post", "tipoVisit.php?opcion=" + opcion + "&cambio=" + cambioF, true);
            xmlhttp.send();
        
        
    }


    function recargarTabla(opcion){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                   
                        document.getElementById("tbl").innerHTML = xmlhttp.responseText;
                        $('.imprimir').DataTable();
                    
                }
            }   
        xmlhttp.open("post", "recargaTbl.php?actualiza=tabla", true);
        xmlhttp.send();
    }

   
    function limpiaF(opcion){
    //alert("Opcion   "+opcion);
    if(opcion==="limpiar"){
        $(document).ready(function(){
            

            $("#visitante").val("Visitante").trigger('change');
           
            $("#observacion").val(""); 
            
            

            $("#tipo").val("Tipo Visitante").trigger('change');
            
            

            $("#estacion").val("Estaciones").trigger('change');

            $('#imagen').html("<img  width='685' height='290' src='../../Vistas/images/volcan.jpg'/>" );
        });
    }
}