<form name="form1" method="post" action="">

    <input type="hidden" name="idDeActualizacion" id="idDeActualizacion" value="00000">

    <div class="modal fade" id="actualizar" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel"><font font font font font font color="black">Editar Registro</font></h3> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="panel-body">
                    <br>

                    <div class="form-group">
                      <div class="col-md-15 col-sm-14 col-xs-15">
                         <div class="row">
              <div class="col-md-20 col-xs-20">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario Modificar</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post" action="usuarios.php">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" 
                      id="nombre" name="nombre" placeholder="Nombre" onkeypress="return soloLetras(event)" 
                       onpaste="return false" value="<?php echo $nombrereal; ?> "autocomplete="off">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="direccion"
                         name="direccion" placeholder="Dirección" value="<?php echo $direccion; ?>"
                         autocomplete="off">
                        <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="telefono" name="telefono" 
                        placeholder="Teléfono" value="<?php echo $tel;?>" autocomplete="off">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="genero" name="genero">
                            <option>Genero</option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                            </select>
                        </div> </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="correo" name="correo" 
                        placeholder="E-mail" value="<?php echo $correo;?>" autocomplete="off">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="tipo" name="tipo">
                            <option>Seleccione tipo de usuario</option>
                            <option>Administrador</option>
                            <option>Estudiante</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="usuario" 
                        name="usuario" placeholder="Nombre de Usuario" value="<?php echo $nombreusu;?>" autocomplete="off">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control has-feedback-left" id="contrasena" name="contrasena" placeholder="Contraseña">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>
                     
            </div>
                     
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Guardar</button>
                          <button type="button" class="btn btn-warning">Cancelar</button>
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
            </div><!--Fin del row del formulario-->

<!-- PROCESO PARA EDITAR LOS DATOS DE LA TABLA -->

<?php 

if (!empty($_REQUEST['nombre'])) {
    try {        
    $nom =  $_REQUEST['nombre'];
    $direc =  $_REQUEST['direccion'];
    $telef = $_REQUEST['telefono'];
    $gen = $_REQUEST['genero'];
    $corre = $_REQUEST['correo'];
    $usua = $_REQUEST['usuario'];
    $contra = $_REQUEST['contrasena'];

    $idActualizacion = $_REQUEST['idDeActualizacion'];

    mysqli_query($mysqli, "UPDATE usuarios SET nombre_real='$nom',direccion='$direc',telefono='$telef',genero='$gen',correo='$corre',usuario='$usua',contrasena='$contra' WHERE idusuario ='$idActualizacion'");

  
    } catch (Exception $ex) {
        
    }
}
?><!-- FIN DEL PROCESO EDITAR DE LA TABLA -->

<script>
    function soloNumero(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key);
        numerito = "0123456789";
        especiales = "8-37-38-46";
        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
            }
        }
        if (numerito.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
    }


    function soloLetras(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key).toLowerCase();
        letras = " Ã¡Ã©Ã­Ã³ÃºabcdefghijklmnÃ±opqrstuvwxyz";
        especiales = "8-37-38-46-164";
        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
                break;
            }
        }
        if (letras.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
    }

</script>

<script src="../jquery.mask.min.js"></script>

<script type="text/javascript">
    $('.mask-dui').mask('00000000-0');
    $('.mask-celular').mask('0000-0000');

</script>