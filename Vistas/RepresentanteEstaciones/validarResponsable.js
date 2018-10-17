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

        nombre: {
          letrasOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 50
        },
        dui: {
          numero: true,
          required: true,
          minlength: 10,
          maxlength: 10
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
          letrasOespacio: true,
          required: true,
          minlength: 10,
          maxlength: 80
        }
       
      },

      messages: {
        
      
        nombre: {
          required: "Por favor, ingrese nombres.",
          maxlength: "Debe ingresar m&aacute;ximo 50 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },

       

        dui: {
          required: "Por favor, ingrese DUI.",
          maxlength: "Debe ingresar m&aacute;ximo 10 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
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


  $('#facultad').on('change', function(){
    var id = $('#facultad').val()
    $.ajax({
      type: 'POST',
      url: '../../../produccion/Administracion/Estudiante/comboCarrera.php',
      data: {'id': id}
    })
    .done(function(listas_rep){
      $('#carrera').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las Carreras')
    })
  })


});

  $("#carrera").keypress(function(e) {
       if(e.which == 13) {
          $('#btnguardar').click();
       }
    });

  $("#btnguardar").click(function(){
    if($("#formestudiante").valid()){
     document.getElementById('bandera').value="add";
      $("#formestudiante").submit();
    }
    
  });

  $("#btnregistro").click(function(){
    $('#registro').modal({show:true});
  });



  $("#modalguardar").click(function(){
    if($("#fromregistro").valid()){

        swal({
            title: "Advertencia",
            text: "¿Desea Dar Baja a Este Registro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false },
            
            function(isConfirm){
            if (isConfirm) {
                //Si
                var observacion = $('#observacion').val();
                var bandera = "darbaja";
                var baccion = $('#baccion').val();
                
                $.ajax({
                  type: 'POST',
                  url: '../../../build/config/sql/estudiante/crud_estudiante.php',
                  data: {'observacion': observacion, 'bandera' : bandera, 'baccion' : baccion}
                })
                .done(function(listas_rep){
                    if(listas_rep === "Exito"){
                        $("#observacion").val("");
                        $('#darBaja').modal('hide'); 
                        swal({ 
                          title:'Éxito',
                          text: 'Datos Almacenados',
                          type: 'success'
                        },
                         function(){
                            //event to perform on click of ok button of sweetalert
                            location.href='../../../produccion/Administracion/Estudiante/listar_Estudiante.php';
                        })
    
                    }
                    if(listas_rep === "Error"){
                      $("#observacion").val("");
                      $('#darBaja').modal('hide'); 
                      swal("Advertencia", "Sin Conexión Dase Datos", "warning")
                    }                
                    })
                    .fail(function(){
                      alert('Hubo un errror al cargar la Pagina')
                    })
            } else {
                 //No
                $("#observacion").val("");
                $('#darBaja').modal('hide'); 
               
            swal("Éxito",
            "Actualización Cancelada",
            "success");
            }
            });
      
    }
});
