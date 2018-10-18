<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Ingenieria de Software</title>

    
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <!-- sidebar menu -->
             <?php 
               include "menuPrincipal.php";
            ?>
            <!-- /sidebar menu -->

            <!-- /menu profile quick info -->

            <br />

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">User
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Nuevo Usuario</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario de ingreso de datos</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" name="form1" method="post" action="usuarios.php">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" 
                        onkeypress="return soloLetras(event)" onpaste="return false" maxlength="50">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" 
                        placeholder="Dirección" autocomplete="off" maxlength="100">
                        <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left mask-celular" id="telefono" name="telefono" 
                        placeholder="Teléfono" autocomplete="off">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                 <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       
                          <select class="form-control" id="genero" name="genero">
                             <option>Seleccione género</option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                            </select>
                        </div> 
                </div>


                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="correo" name="correo" placeholder="E-mail" autocomplete="off">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="tipo" name="tipo">
                            <option>Seleccione tipo de usuario</option>
                            <option>Administrador</option>
                            <option>Estudiante</option>
                            </select>
                        </div> </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" 
                        id="usuario" name="usuario" placeholder="Nombre de Usuario" autocomplete="off" maxlength="10">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control has-feedback-left" id="contrasena" name="contrasena" placeholder="Contraseña" autocomplete="off">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>
         
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Guardar</button>
                          <button type="button" class="btn btn-warning">Cancelar</button>
						   <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
            </div><!--Fin del row del formulario-->

          </div>
    
     <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Genero</th>
                          <th>Correo</th>
                          <th>Contraseña</th>
                          <th>Nombre Usuario</th>
                          <th>Tipo</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                            <!-- extraccion de datos de la base  -->
                            <tbody>

                          <?php
                          include "../ProcesoSubir/conexion.php";
              $query = mysqli_query ($mysqli,"SELECT * FROM usuarios");

                while ($fila=mysqli_fetch_array($query)) {
                    $nombrereal =$fila['nombre_real'];
                    $direccion = $fila['direccion'];
                    $tel=$fila['telefono'];
                    $genero=$fila['genero'];
                    $correo=$fila['email'];
                    $contra=$fila['contrasena'];
                    $nombreusu=$fila['nombre_de_usuario'];
                    $nombreusu=$fila['tipo'];
                    $id=$fila['idusuario'];
                ?>

                        <tr>
                          <td><?php echo $fila['nombre_real']; ?></td>
                          <td><?php  echo $fila['direccion']; ?></td>
                          <td><?php  echo $fila['telefono'];?></td>
                          <td><?php  echo $fila['genero']; ?></td>
                          <td><?php  echo $fila['email']; ?></td>
                          <td><?php  echo $fila['contrasena']; ?></td>
                          <td><?php  echo $fila['nombre_de_usuario']; ?></td>
                          <td><?php  echo $fila['tipo']; ?></td>
                        
                         <td><!--boton de modificar-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <a href="" data-toggle="modal" data-target="#actualizar" 
                                        onclick="Editar('<?php echo $nombrereal; ?>',
                                        '<?php echo $direccion; ?>',
                                        '<?php echo $tel;?>',
                                        '<?php echo $genero;?>',
                                        '<?php echo $correo;?>',
                                        '<?php echo $contra;?>',
                                        '<?php echo $nombreusu;?>',
                                        '<?php echo $tipo;?>',
                                        '<?php echo $id;?>')" >
                                        <button type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                
                                    </div>

                                    
                                  </div>
                                  </td>
                                  <td>
                                      
                                      <div class="row">
                                        
                                         
                                         <div class="col-md-6">
                                        
                                        <a href="#" data-href="matar.php?id_visitante=<?php echo $row['id_visitante']; ?>" data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                      
                                
                                    </div>
                                          
                                      </div>
                                  </td>     
                               
                            </tr>
                        
                       <?php } ?> 
      
                      </tbody>
       
                    </table>     
                         
                      </div>
                      </div>

                    </form>
                  </div>
                </div>
        <!-- /page content -->

        <!-- llamada al footer -->
       <?php 
       include "footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
	
  </body>
</html>


<?php
require '../ProcesoSubir/conexion.php';

//inserta usuario

if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['telefono']) && !empty($_POST['genero']) 
  && !empty($_POST['correo']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'] && !empty($_POST['tipo'])))  {

$insertar="INSERT INTO usuarios (nombre_de_usuario,nombre_real,direccion, telefono,genero,email,contrasena,tipo)
 VALUES ('$_POST[usuario]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]','$_POST[genero]',
  '$_POST[correo]','$_POST[contrasena]','$_POST[tipo]')";
$ejecutar=mysqli_query($mysqli,$insertar);
?>
<script type="text/javascript">
  location.href="usuarios.php";
</script>
<?php


}
?>

<?php
            include_once'usuariosModi.php'
            ?>

<script>
function Editar(nombre_real,direccion,telefono,genero,email,contrasena,nombre_de_usuario,tipo,id){
    $("#nombre").val(nombre_real);
    $("#direccion").val(fechavisita);
    $("#telefono").val(telefono);
    $("#genero").val(genero);
    $("#email").val(email);
    $("#contrasena").val(contrasena);
    $("#usuario").val(nombre_de_usuario);
    $("#tipo").val(tipo);
    $("#idDeActualizacion").val(id);
    

}
</script>

 <script >
function ValidateEmail(email) { 
var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(correo.value.match(mailformat)){ 
alert("Gracias, Direccion de Email valida"); 
document.form1.correo.focus();
return true; 
} else { 
alert("You have entered an invalid email address!"); 
document.form1.correo.focus(); 
return false; 
 } 
}
</script>

   </script>
   <script src="email-validation.js">
   </script>

 <script src="../js/jquery.maskedinput.min.js"></script>
 <script src="../js/jquery-3.2.1.min.js"></script>
 <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            
            $("#telefono").mask("9999-9999");
            
        });
          
        
    </script>
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