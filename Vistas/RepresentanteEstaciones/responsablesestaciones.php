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
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">

    <style>
    #preview {
      width: 25%;
      margin: 0 auto;
      margin-bottom: 10px;
      position: relative;
    }
         
    #preview a {
      position: absolute;
      bottom: 5px;
      left: 5px;
      right: 5px;
      display: none;
    }

    input[type=file] {
      position: absolute;
      visibility: hidden;
      width: 0;
      z-index: -9999;
    }      
  </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <!-- sidebar menu -->
             <?php 
               include "../menuPrincipal.php";
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
                    <img src="../images/img.jpg" alt="">Jessica
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
                <h3>Responsables de Estaciones Meteorol&oacute;gicas</h3>
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
                    <h2>Lista de Responsables</h2>
                   
                    
                    <div class="clearfix"></div>
                    
                  </div>


                    <div class="x_content">
                     
                    <button type="button" id="btnregistro" name="btnregistro" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Responsable</button>
                    <br /> <br /> 
                    <form class="form-horizontal form-label-left">

                   
                  
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nombres</th>
                          <th>Direcci&oacute;n</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      require '../../ProcesoSubir/conexioneq.php';
                      $result = $conexion->query("SELECT * FROM respestaciones");
                      $contador=1;
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                         
                          echo "<tr>";
                          echo "<td>" .$contador. "</td>";
                          echo "<td>" . $fila->nombre . "</td>";
                          echo "<td>" . $fila->direccion . " </td>";
                          echo "<td> <a class='btn btn-success openBtn' type='button' onclick='ver(".$fila->idresponsable.")'><i class='fa fa-eye'></i></a>
                                     <a class='btn btn-info' onclick='modify(".$fila->idresponsable.")' ><i class='fa fa-edit'></i></a>
                                     <a class='btn btn-danger' onclick='confirmar(".$fila->idresponsable.")' ><i class='fa fa-long-arrow-down'></i></a>
                                      </td>";
                          echo "</tr>";
                          $contador++;

                        }
                       }
                      ?>
                        
                      </tbody>
                    </table>
                    </form>
                  </div>
                </div>
              </div>      
            </div>

          </div>

          <!-- Modal -->
          <form id="fromregistro" name="fromregistro">
                    <div class="modal fade" id="registro" name="registro" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);">Registro de Representante Estaciones</h4>
                        </div>
                        

                        <div class="modal-body1">
                        <br/>
                        <!--inicia el div para capturar la imagen -->
                        <div class="form-group " align="center" >
                          <label for="control-label" for="foto">Foto</label>
                          <div name="preview" id="preview" class="thumbnail">
                            <a href="#" id="file-select" class="btn btn-success"><span class="fa fa-camera">&nbsp;&nbsp;&nbsp;</span>Elegir archivo</a>
                            <img src="../images/user9.jpg"/>
                          </div>

                            <div id="file-submit" >
                              <input id="file" name="file" type="file" accept="image/*" required/>
                              <span class="help-block" id="error"></span>
                            </div> 
                          </div><br><br>
                        <!--finaliza el div para capturar la imagen -->
                        
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre: <span class="required" style="color: #CD5C5C;"> *</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="nombre" name="nombre" placeholder="Digite Nombre Completo" class="form-control col-md-7 col-xs-12" tabindex="1">
                            <br>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div><br><br><br>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span class="required" style="color: #CD5C5C;"> *</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="dui" name="dui" placeholder="Digite DUI" class="form-control col-md-7 col-xs-12" tabindex="2">
                            <br>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div><br><br><br>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Direcci&oacute;n: <span class="required" style="color: #CD5C5C;"> *</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="direccion" name="direccion" placeholder="Digite Direcci&oacute;n" class="form-control col-md-7 col-xs-12" tabindex="3">
                            <br>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div><br><br><br>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono1">Tel&eacute;fono 1: 
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="telefono1" name="telefono1" placeholder="Digite N&uacute;mero de Tel&eacute;fono" class="form-control col-md-7 col-xs-12" tabindex="4">
                            <br>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div><br><br><br>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono2">Tel&eacute;fono 2: 
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="telefono2" name="telefono2" placeholder="Digite N&uacute;mero de Tel&eacute;fono" class="form-control col-md-7 col-xs-12" tabindex="5">
                            <br>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>

                        <br><br><br><br>
                          
                        </div>
                        <div class="modal-footer">
                          <p align="left" style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-primary" type="button"  id="modalguardar" name="modalguardar"><i class="fa fa-save">  Guardar</i></button>
                        </div>

                       
                      </div>
                    </div>
                  </div>
                  </form>
                  <!-- Fin Modal -->



        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php 
       include "../footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- validator -->
    <script src="../../vendors/validar/jquery.validate.js"></script>
  
    <script src="../../Vistas/RepresentanteEstaciones/validarResponsable.js"></script>
	
  </body>
</html>
