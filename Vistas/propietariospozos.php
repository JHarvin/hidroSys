<?php
if(isset($_REQUEST["id"])){
    include("../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $result = $conexion->query("select * from propietariospozos where id_propietario='$iddatos'");
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $nombre=$fila->nombre;
                $apellido=$fila->apellido;
                $dui=$fila->dui;
                $direccion=$fila->direccion;
                $celular=$fila->telcelular;
                $telefono=$fila->telfijo;
                $genero=$fila->genero;
                $correo=$fila->correo;
            }
        }
}else{
    $nombre=null;
    $apellido=null;
    $dui=null;
    $direccion=null;
    $celular=null;
    $telefono=null;
    $genero=0;
    $correo=null;
}
?>
<!DOCTYPE html>
<html lang="es">
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
    <!-- Alertify -->
    <link href="../libreriasJS/alertifyjs/css/alertify.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
                    <img src="images/img.jpg" alt="">Jessica
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
                <h3>Propietarios de pozos.</h3>
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
                    <h2>Formulario de ingreso de datos.</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal" id="formPropietario" name="formPropietario" method="post">
                    <input type="hidden" name="bandera" id="bandera"/>
                    <div id="cambiaso"><input type="hidden" id="baccionVer" value="1" /></div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                       <?php
                          if(isset($_REQUEST["id"])){
                              ?>
                            <input type="text" class="form-control has-feedback-left" id="dui" name="dui" placeholder="Dui" onblur="verificarCodigo('dui');" data-inputmask="'mask': '99999999-9'" value="<?php echo $dui; ?>" disabled>
                            <?php
                          }else{
                              ?>
                             <input type="text" class="form-control has-feedback-left" id="dui" name="dui" placeholder="Dui" onblur="return verificar('dui');" data-inputmask="'mask': '99999999-9'" value="<?php echo $dui; ?>">
                             <?php
                          }
                              ?>
                              
                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true" ></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="correo" name="correo" placeholder="Correo electronico." value="<?php echo $correo; ?>" onblur="return verificar('correo');">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre"  placeholder="Nombre" value="<?php echo $nombre;?>" onkeypress="return soloLetras(event)">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="apellido" name="apellido" placeholder="Apellido"
                        value="<?php echo $apellido;?>" onkeypress="return soloLetras(event)">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                     
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="telefono" name="telefono" placeholder="Telefono" onblur="return verificar('telefono');" data-inputmask="'mask': '2999-9999'" value="<?php echo $telefono; ?>">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="celular" name="celular" placeholder="Celular" onblur="return verificar('celular');" data-inputmask="'mask': '9999-9999'" value="<?php echo $celular; ?>">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $direccion; ?>">
                        <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control SSexo" id="sexo" name="sexo">
                           <?php if($genero===0){
                            ?>
                                <option value="0" selected >Genero</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            <?php
                            }else if($genero==="Femenino"){
                            ?>
                            <option value="0">Genero</option>
                            <option value="Femenino" selected>Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <?php
                            }else if($genero==="Masculino"){
                            ?>
                            <option value="0">Genero</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino" selected>Masculino</option>
                            <?php
                                }
                              ?>
                          </select>
                        </div>
                      </div>                     
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>            
                      <div class="ln_solid"></div>
                      <div class="form-group text-center" id="divBotones">
                       
                       <?php
                        if(!isset($iddatos)){
                                ?>
                       <button type="button" class="btn btn-success" id="btnGuardar" onclick="verificar('guardar');">Guardar</button>
                        <button type="button" class="btn btn-warning" id="btnCancelarG" onclick="cancelar();">Cancelar</button>
                        <?php
                        }else{
                            ?>
                        <button type="button" class="btn btn-success" id="btnModificar" onclick="verificar('modificar');">Modificar</button>
                        <button type="button" class="btn btn-warning" id="btnCancelar" onclick="cancelar();">Cancelar</button>
                        <?php
                        }?>       
                      </div>
                      </div>
                    </form>              
                </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                    <div class="x_title">
                          <div class="col-sm-9">
                              <h3>Datos</h3>
                          </div>
                           <div class="col-sm-3" id="divInactivos">
                               <button type="button" class="btn btn-dark" id="btnCancelar" onclick="cambio('0');"><i class="fa fa-info-circle"></i>   Propietarios Inactivos</button>
                           </div>
                           <div class="col-sm-3" id="divActivos" hidden>
                               <button type="button" class="btn btn-dark" id="btnCancelar" onclick="cambio('1');"><i class="fa fa-info-circle"></i>  Propietarios Activos</button>
                           </div>
                            <div class="clearfix"></div>
                        </div>
                    <div class="x_content" id="contenidoTabla">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap tablita" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                          <th>Dui</th>
                          <th>Nombre</th>
                          <th>Celular</th>
                          <th>Direccion</th>
                           <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php
                    include "../Config/conexion.php";
                    $result = $conexion->query("select * from propietariospozos where activo='1'");
                    if ($result) {
                        while ($fila = $result->fetch_object()) {
                            echo "<tr>";
                            ?>
                            <td><?php echo $fila->dui ?></td>
                            <td><?php echo $fila->nombre.' '.$fila->apellido?></td>
                            <td><?php echo $fila->telcelular ?></td>
                            <td><?php echo $fila->direccion ?></td>
                            <td width=160 class="text-center">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#propietarioModal" onclick="actualizarModalPropietario('', '<?php echo $fila->id_propietario ?>')"><i class="fa fa-search" ></i></button>
                            <button type="button" class="btn btn-success" onclick="cambios('modificar','<?php echo $fila->id_propietario ?>','<?php echo $fila->nombre.' '.$fila->apellido ?>')"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-warning" onclick="cambios('desactivar','<?php echo $fila->id_propietario ?>','<?php echo $fila->nombre.' '.$fila->apellido ?>');"><i class="fa fa-arrow-circle-down"></i></button>
                             </td>
                            <?php
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                    </table>  
                    </div>
                    </div>
                    </div>
              </div>      
            </div> 
          </div>
        </div>
        <!-- /page content -->
       
       <!-- div para verificar el cambio de estado -->
       <div id="cambioEstado">
           <input type="hidden" value="0" name="quepaso" id="quepaso"/>
       </div>
       
       
      </div>
    </div>
     <!-- footer content -->
       <?php 
       include "footer.php";
       ?>
        <!-- /footer content -->
    
     <!--- Modal -->
        <div class="modal fade" id="propietarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h4 class="modal-title" id="exampleModalLabel">Informacion propietario.</h4> </center>
                    </div>
                    <div class="modal-body" id="cargala"> 
                    <br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        
    <!-- JQUery Form -->
    <script src="../libreriasJS/jquery_form/dist/jquery.form.min.js"></script>
    <!-- Personal -->
    <script src="js/propietariosPozos/propietariosPozos.js"></script>
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
    <script src="../vendors/select2/dist/js/select2.min.js"></script>
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
    <!-- Jquery Mask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>  
    <!-- Alertify -->
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>
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
    <script>
        $(function () {
            $('.SSexo').select2()
        });
    </script>
  </body>
</html>
<?php
    include '../Config/conexion.php';
    $bandera=$_REQUEST["bandera"];
    $nombre=$_REQUEST["nombre"];
    $apellido=$_REQUEST["apellido"];
    $telefono=$_REQUEST["telefono"];
    $direccion=$_REQUEST["direccion"];
    $celular=$_REQUEST["celular"];
    $genero=$_REQUEST["sexo"];
    $correo=$_REQUEST["correo"];
    $dui=$_REQUEST["dui"];

if ($bandera == "guardar") {
    $consulta  = "INSERT INTO propietariospozos VALUES('".$dui."','".$nombre."','".$apellido."','".$direccion."','".$celular."','".$telefono."','".$genero."','1','null','2','".$correo."')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
       mensaje("exito","guardar");
    } else {
       mensaje("error","guardar");
    }
}
if($bandera==="modificar"){
     $consulta  = "UPDATE propietariospozos set apellido='".$apellido."',  nombre='" . $nombre."',telfijo='" . $telefono . "',direccion='" . $direccion . "', telcelular='".$celular."', correo='".$correo."', genero='".$genero."' where id_propietario='".$iddatos."'";
     $resultado = $conexion->query($consulta);
    if ($resultado) {
        mensaje("exito","modificar");
    } else {
        mensaje("error","modificar");
    }
}

function mensaje($tipo,$opcion){
            echo "<script language='javascript'>";
            echo "detener();";
            echo "alerta('".$tipo."','".$opcion."');";
            echo "</script>";
}
?>
















