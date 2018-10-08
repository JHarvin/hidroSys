<?php
$guardo  = $_REQUEST["guardo"];
if($guardo==1){
msg("Los datos fueron almacenados con exito");
}else{
msg("Los datos fueron almacenados con exito");
}
?>
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
    <script type="text/javascript"> 
      function validar(){
        alert("llega");
          if( document.getElementById('nombre').value=="" ){
            alert("Complete los campos");
          }else{
              document.turismo.submit();
            }
        }
      </script>
  </head>
  <!--Aqui va el javascript-->


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
                    <img src="images/img.jpg" alt="">Abigal
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
                <h3>Equipos</h3>
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
                    <form name="form" method="post" action="../Controladores/guardarequipo.php">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Nombre del equipo<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="nombre" id="nombre" placeholder="Nombre">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Marca<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" id="marc" nme="marc" placeholder="Marca">
                        <span class="fa fa-registered form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Número de serie<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="numserie" id="numserie" placeholder="Número de Serie">
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Donantes<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="Donantes" id="donadores" placeholder="Donadores">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label>Tipo de uso<small class="text-muted"></small></label>
                          <select class="form-control" name="tipo">
                            <option>Seleccione</option>
                            <option>Pluviometro</option>
                            <option>Agrometeorologico</option>
                            <option>Estación Meteorologica</option>
                            <option>Otros</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label>Estado del equipo<small class="text-muted"></small></label>
                          <select class="form-control" name="estado">
                            <option>Seleccione</option>
                            <option>En uso</option>
                            <option>En mal estado</option>
                            <option>Extraviado</option>
                            </select>
                        </div> 
                      </div>
                   
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label>Descripción<small class="text-muted"></small></label>
                      <textarea style="width: 1065px;" rows="3" size="100" value="" class="form-control" name="descripcion" placeholder="Descripción" id="descripcion"></textarea>
                      </div>
                      </div>
                   
                      
                      <div class="form-group">
                      
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                       
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                   
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" style="padding-bottom:10px;">
                      
                         
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group" style="margin-top:50px;margin-left:300px">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" onclick="validar()" class="btn btn-success">Guardar</button>
                          <button type="button" class="btn btn-warning">Cancelar</button>
						   <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
            </div>

           <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de equipos</h2>

                    <div class="clearfix"></div>
                  </div>
                   <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Tipo de uso</th>
                          <th>Marca</th>
                          <th>Número de serie</th>
                          <th>Donador</th>
                          <th>Estado</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> 

        
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
	
  </body>
</html>
<?php
 function msg($texto)
 {
     echo "<script type='text/javascript'>";
     echo "alert('$texto');";
     //echo "document.location.href='materias.php';";
     echo "</script>";
 }
 function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetConfirm('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
}
 ?>