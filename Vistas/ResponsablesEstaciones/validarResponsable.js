$(document).ready(function(){
      $('#preview').hover(
        function() {
            $(this).find('a').fadeIn();
        }, function() {
            $(this).find('a').fadeOut();
        });
    
        $('#file-select').on('click', function(e) {
             e.preventDefault();
            
            $('#file').click();
        });
    
        $('input[type=file]').change(function() {
          var file = (this.files[0].name).toString();
          var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview img').attr('src', e.target.result);
            }
             
            reader.readAsDataURL(this.files[0]);
        });
      
    $('input').on('keypress', function(e){
      if (e.keyCode == 13) {
        // Obtenemos el número del atributo tabindex al que se le dio enter y le sumamos 1
        var TabIndexActual = $(this).attr('tabindex');
        var TabIndexSiguiente = parseInt(TabIndexActual) + 1;
        // Se determina si el tabindex existe en el formulario
        var CampoSiguiente = $('[tabindex='+TabIndexSiguiente+']');
        // Si se encuentra el campo entra al if
        if(CampoSiguiente.length > 0)
        {
        CampoSiguiente.focus(); //Hcemos focus al campo encontrado
        return false; // retornamos false para detener alguna otra ejecucion en el campo
        }else{// Si no se encontro ningún elemento, se retorna false
        return false;
        }
      }
    });
    
    $.validator.addMethod("letrasOespacio", function(value, element) {
        return /^[ a-záéíóúüñ]*$/i.test(value);
    }, "Ingrese sólo letras o espacios.");

    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
    }, "Ingrese sólo letras, números o espacios.");

    $.validator.addMethod("numero", function(value, element) {
        return /^[ 0-9-()]*$/i.test(value);
    }, "Ingrese sólo números");

    $.validator.addMethod("correo", function(value, element) {
        return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
    }, "Ingrese un correo v&aacute;lido.");

    $("#fromregistro").validate({
      errorPlacement: function (error, element) {
            $(element).closest('.form-group').find('.help-block').html(error.html());
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(element).closest('.form-group').find('.help-block').html('');
        },
      rules: {

        institucion: {
          alfanumOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 50
        },
        responsable: {
          letrasOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 50
        },

       telefono1: {
          numero: true,
          required: false,
          minlength: 9,
          maxlength: 9
        },

        telefono2: {
          numero: true,
          required: false,
          minlength: 9,
          maxlength: 9
        },


        direccion: {
          alfanumOespacio: true,
          required: true,
          minlength: 10,
          maxlength: 80
        }
       
      },

      messages: {
        institucion: {
          required: "Por favor, ingrese instituci&oacute;n.",
          maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        responsable: {
          required: "Por favor, ingrese responsable.",
          maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },

        telefono1: {
          required: "Por favor, ingrese teléfono.",
          maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },

        telefono2: {
          required: "Por favor, ingrese teléfono.",
          maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },
        direccion: {
          required: "Por favor, ingrese dirección.",
          maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
        }
        
      }
    });
   
});

 /* $("#btnregistro").click(function(){
    $('#registro').modal({show:true});
  });*/

  $("#telefono2").keypress(function(e) {
    if(e.which == 13) {
       $('#modalguardar').click();
    }
 });

  $("#modalguardar").click(function(){
    if($("#fromregistro").valid()){ 
        
                var foto = $('#file').val();
                var institucion = $('#institucion').val(); 
                var responsable = $('#responsable').val();
                var direccion = $('#direccion').val();
                var telefono1 = $('#telefono1').val();
                var telefono2 = $('#telefono2').val();
                var bandera = "guardar";
               
                
                $.ajax({
                  type: 'POST',
                  url: '../../Controladores/crudresponsablesestaciones.php',
                  data: {'institucion': institucion, 
                         'responsable': responsable,
                         'direccion': direccion,
                         'telefono1': telefono1,
                         'telefono2': telefono2,
                         'foto': foto,
                         'bandera' : bandera}
                })
                .done(function(listas_rep){
                 // alert(listas_rep);
                    if(listas_rep === "Exito"){
                      
                      $("#div_resultado_responsable").load('tabla_responsables.php');
                        $("#institucion").val("");
                        $("#responsable").val("");
                        $("#direccion").val("");
                        $("#telefono1").val("");
                        $("#telefono2").val("");
                        $("#file").val("");
                        $('#preview img').attr('src', '../images/img2.png');
                        $('#registro').modal('hide'); 
                        alertify.set("notifier","position", "top-right");
                        alertify.success("Registro almacenado correctamente.    ✔");
                        
  
                    }
                    if(listas_rep === "Error"){
                      $("#institucion").val("");
                      $("#responsable").val("");
                      $("#direccion").val("");
                      $("#telefono1").val("");
                      $("#telefono2").val("");
                      $("#file").val("");
                      $('#preview img').attr('src', '../images/img2.png');
                      $('#registro').modal('hide'); 
                      alertify.set("notifier","position", "top-right");
                      alertify.error("Algo salio mal :(");
                    }                
                    })
                    .fail(function(){
                      alert('Hubo un errror al cargar la Pagina')
                    })
                  }
    
});
