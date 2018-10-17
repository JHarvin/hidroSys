<?php
header("Content-Type: text/html;charset=utf-8");
include "../conexion/conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Datos de pozos</title>

    
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
                <h3>Datos de pozos.</h3>
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
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                        

                        <input type="text" class="form-control has-feedback-left" id="dui" placeholder="Codigo" readonly="readonly">

                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="departamento" name="departamento" class="form-control">
                            <option value="" disabled selected hidden>Seleccione un departamento</option>
                              <?php 
                                $result = $conexion->query("SELECT * FROM departamentos");
                                while($fila=$result->fetch_object()){

                                  echo "<option value=".$fila->iddepto.">".$fila->nombredepto."</option>";
                                }
                              ?>
                            </select>
                        </div>
                      
                      
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="municipio" name="municipio" class="form-control">
                            <option value="" disbled selected hidden>Seleccione un municipio</option>
                            
                            </select>
                        </div>
                      
                      
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="propietario" name="propietario" class="form-control">
                            <option>Propietario</option>
                            <option>Alfonso Hernandez</option>
                            <option>Jennifer Alfaro</option>
                            <option>Carlos Gonzales</option>
                            <option>Jorge Granados</option>
                            </select>
                        </div>

                      <div class="col-md-1 col-sm-1 col-xs-12 ">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Abrir mapa</button>
                      </div>

                      <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                        <input id="latitud" name="latitud" type="text" class="form-control has-feedback-left" placeholder="Latitud, g°" readonly="readonly">
                        <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                        <span class=" form-control-feedback rigth" aria-hidden="true">Lat</span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="longitud" name="longitud" type="text" class="form-control has-feedback-left" placeholder="Longitud, g°" readonly="readonly">
                        <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                        <span class=" form-control-feedback rigth" aria-hidden="true">Long</span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="altura" name="altura" type="text" class="form-control has-feedback-left" placeholder="Altura, msnm (metros sobre el nivel del mar)">
                        <span class="fa fa-arrow-up form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="nivel" name="nivel" type="text" class="form-control has-feedback-left" placeholder="Nivel del pozo, mtrs (metros)">
                        <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="profundidad" name="profundidad" type="text" class="form-control has-feedback-left" placeholder="Profundidad, mts (metros)">
                        <span class="fa fa-arrow-down form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="fecha" name="fecha" id="fecha" type="text" class="form-control has-feedback-left" placeholder="Fecha de creación" onfocus="(this.type='date')">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        
                      </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="tipo" name="tipo" class="form-control">
                            <option value="0">Tipo de pozo</option>
                            <option value="municipal">Municipal</option>
                            <option value="gubernamental">Gubernamental (ANDA)</option>
                            <option value="privado">Privado</option>
                            <option value="comunitario">Comunitario</option>
                          </select>
                        </div>
                      
                        <div id="estado" name="estado" class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select class="form-control">
                            <option value="activo">En uso</option>
                            <option value="inactivo">Inactivo</option>
                            
                            
                          </select>
                        </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">        
                          <textarea id="geologia" name="geologia" class="form-control" style="max-height:150px; min-height:100px; resize: vertical;" placeholder="Geologia."></textarea>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">        
                          <textarea id="observacion" name="observacion" class="form-control" style="max-height:150px; min-height:100px;resize: vertical;" placeholder="Observación."></textarea>
                      </div>
                     
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-success">Guardar</button>
                        <button type="reset" class="btn btn-warning">Cancelar</button>
						  
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
            </div><!--Fin del row del formulario-->
            <div class="row"><!--Inicio del row-->

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Tipo de pozo</th>
                          <th>Propietario</th>
                          <th>Estado</th>
                          <th>Ubicacion</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <tr>
                          <td>svsv1</td>
                          <td>Privado</td>
                          <td>Gilberto Santa Rosa</td>
                          <td bgcolor=#dff8e7>En uso</td>
                          <td width=50><button type="button" class="btn btn-info" style="width:80px;"><i class="fa fa-map-marker fa-lg"></i></button></td>
                          <td width=160>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".detalle-modal-lg" style="width:70px;"><i class="fa fa-search"></i></button>
                            <button type="button" class="btn btn-success" style="width:70px;"><i class="fa fa-pencil"></i></button>
                          </td>
                          
                        </tr>
                        <tr>
                          <td>svsc2</td>
                          <td>Comunitario</td>
                          <td>Gilberto Santa Rosa</td>
                          <td >Inactivo</td>
                          <td width=50><button type="button" class="btn btn-info" style="width:80px;"><i class="fa fa-map-marker fa-lg"></i></button></td>
                         <td width=160>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".detalle-modal-lg" style="width:70px;"><i class="fa fa-search"></i></button>
                            <button type="button" class="btn btn-success" style="width:70px;"><i class="fa fa-pencil"></i></button>
                         </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            
            </div><!--Inicio del row-->
          

        
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php 
       include "footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>

      <!-- Mapa modal-->


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><i class="fa fa-map-marker fa-3x"></i> Ubicación de pozos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                      <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Seleccione una ubicación</h2>
                              
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <br />
                              <div class="embed-responsive embed-responsive-4by3">
                                        <iframe src="ej.php" class="embed-responsive-item" allowfullscreen></iframe>
                                      </div>
                            </div>
                          </div>
                      </div>

                    </div><!--Fin del row-->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                
                </div><!--Fin del content-->
              </div>
         </div>

      <!-- Mapa modal-->

      <!--Detalle modal-->
      <div class="modal fade detalle-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong><i class="fa fa-list-ul fa-2x"></i></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <table class="table table-bordered">
                    
                      <thead>
                        <tr><th colspan=5 style="text-align:center;"> DETALLE DE POZO </th></tr>
                        <tr bgcolor=#dff8e7>
                          <th>Codigo</th>
                          <th>Departamento</th>
                          <th>Municipio</th>
                          <th>Propietario</th>
                          <th>Altura sobre el nivel del mar</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>1</th>
                          <td>San vicente</td>
                          <td>San cayetano</td>
                          <td>Gilberto Santa Rosa</td>
                          <td>200 mtrs</td>
                        </tr>
                      </tbody>
                      <thead>
                        <tr bgcolor=#dff8e7>
                          <th>Nivel de pozo</th>
                          <th>Profundidad</th>
                          <th>Fecha de creacion</th>
                          <th>Tipo de pozo</th>
                          <th>Estado</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>5 mtrs</th>
                          <td>35 mtrs</td>
                          <td>03/04/1996</td>
                          <td>Comunitario</td>
                          <td>En uso</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">        
                          <textarea id="geologia" name="geologia" class="form-control" style="max-height:150px; min-height:100px; resize: vertical;" placeholder="Geologia."></textarea>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">        
                          <textarea id="observacion" name="observacion" class="form-control" style="max-height:150px; min-height:100px;resize: vertical;" placeholder="Observación."></textarea>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>

                </div><!--Fin del content-->
              </div>
         </div>  
      
      <!--Detalle modal-->


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
	  <script src="../libreriasJS/jquery.mask.min.js"></script>

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

    <!--Escripts de pre procesamiento-->

    <script src="js/datosDePozosJs/cargarMunicipios.js"></script>
    
    <!--Escripts de pre procesamiento-->
	
	<!--Configuaracion de las mascaras del formulario-->
	<script>
      $(document).ready(function(){
  $('#codigo').mask('0000');
  
  
});
      </script>
      <script>
//--codigo para generar el codigo del poso el que dijo la ing
          //--sobre que si el poso esta ahuchapan y municipio san sebastian el codigo 
          //--seria ap-sb-01
          
          

</script>
  </body>
</html>
