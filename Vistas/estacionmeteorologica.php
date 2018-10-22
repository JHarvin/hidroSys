<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);

 include "../ProcesoSubir/conexioneq.php";
 $conexion->set_charset("utf8");
 //Query para generar codigo.
 
                  $resultc = $conexion->query("select id_estacion as id from estacionmet");
                      if ($resultc) {

                        while ($filac = $resultc->fetch_object()) {
                          $temp=$filac->id;
                         
                           }
                      }   
                      $codigo=sprintf("%02s",$temp+1);    
?>

<!DOCTYPE html>
<html lang="es">
  <head>
  <script type="text/javascript">
    $(document).ready(function () {
      recargarLista();


      $('#lista1').change(function(){
        recargarLista();
        
      });
      
    })
  </script>
  <!-- Quitar antes de subir ya que es codigo para el live reload -->


  <script type="text/javascript">
  function ponerAbreviatura(){
    var iddepto=document.getElementById("lista1").value;
    var idmunicipio=document.getElementById("lista2").value;
    // alert(iddepto);
    // alert(idmunicipio);
    if(iddepto!=0 && idmunicipio!=0){
      $.ajax({
        type: "POST",
        dataType: 'html',
        url: "abreviaturas.php",
        data: "departamento="+iddepto+"&municipio="+idmunicipio,
        success: function(resp){
           //alert(resp);
           document.getElementById("codigo").value=resp+document.getElementById("correlativo").value;
        }
    });
    }
  }
  function prueba(){
    $.ajax(
      {
        type:"POST",
        url:"departamentosMunicipios.php",
        data:"departamento="+$('#lista1').val(),
        success:function(r){
          $('#lista').html(r);
          ponerAbreviatura();
        }
      });
  }
  function verificar(){
          if(document.getElementById('codigo').value=="" ||
            document.getElementById('lista1').value=="0"  ||
            document.getElementById('lista2').value=="0"  ||
            document.getElementById('institucion').value=="" ||
            document.getElementById('latitud').value=="" ||
            document.getElementById('longitud').value==""){
            alert("Complete los campos");
          }else{
            document.getElementById('bandera').value="add";
            alert("no van vacios.");
           document.hidro.submit();
          }

        }
  function prueba2(){
   
    alert(document.getElementById("latitud").value);
    alert(document.getElementById("longitud").value);
  }
  </script>
  <script>

  </script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>SICA |</title>

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

  <body class="nav-md" onload="prueba()">
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
                    <img src="images/img.jpg" alt="">Fernando Josue
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
        <div class="right_col" role="main" >
        <!--style="background: url('../production/images/volcan.jpg') top left no-repeat;";-->
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Estación Meteorológica</h3>
              </div>

              <div class="title_right">
                <div  class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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
              <div class="col-md-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ingreso de datos</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" name="hidro" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                      <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="codigo" name="codigo" placeholder="Codigo" value="<?php echo $codigo;?>" readonly>
                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                      </div>
                   
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select class="form-control" id="lista1" name='lista1' onchange="prueba()">
                            <option value="0">Departamento</option>
                            <?php 
                            include "../ProcesoSubir/conexioneq.php";
                             $consulta  = "select * from departamentos";
                             $resultado = $conexion->query($consulta);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                                echo "<option value='".$fila->iddepto."'>".$fila->nombredepto."</option>";
                               }
                                 
                             } else {
                                echo "<option value=''>Error conectando la BD</option>";
                             }
                            
                            ?>
                            
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12" id="lista" name='lista'>
                          
                        </div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="institucion" name="institucion">
                            <option value="">Institucion</option>
                            <?php 
                            include "../ProcesoSubir/conexioneq.php";
                             $consulta  = "select * from respestaciones";
                             $resultado = $conexion->query($consulta);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                                echo "<option value='".$fila->idresponsable."'>".$fila->institucion."</option>";
                               }
                                 
                             } else {
                                echo "<option value=''>Error conectando la BD</option>";
                             }
                            ?>
                          </select>
                        </div>
                       </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fotografía(PNG,JPEG,JPG)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" class="form-text" id="imagen" name="imagen" required accept="image/jpg,image/png,image/jpeg">
                        </div>
                      </div>
                      
                        <input type="hidden" class="form-control has-feedback-left" id="longitud" name="longitud" placeholder="Longitud">
                        <input type="hidden" class="form-control has-feedback-left" id="latitud" name="latitud" placeholder="Latitud">
                      <input type="hidden" class="form-control has-feedback-left" id="correlativo" name="correlativo" placeholder="correlativo" value="<?php echo $codigo;?>">

                      </div>
                     
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-success" onclick="verificar()">Guardar</button>
                          <button type="button" class="btn btn-warning">Cancelar</button>
						   <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>  

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>MAPA <small>Estación Meteorológica.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div style="height:210px;" class="x_content">
                    <br />
                    <div  class="embed-responsive embed-responsive-4by3">
                              <iframe style="height:210px;" src="ej.php" class="embed-responsive-item" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div> 


              


            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                  <div class="x_title">
                    <h2>Registros generales de estaciones meteorologicas.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                       <div class="clearfix"></div>
                       </li>
           
             </ul>
             <div class="clearfix"></div>
              </div>

      <div class="x_content">
        <p class="text-muted font-13 m-b-30"></p>
         <table id="datatable" class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            
                            <th width="75"><font color="black">Codigo</font></th>
                            <th width="150"><font color="black">Departamento</font></th>
                            <th width="150"><font color="black">Municipio</font></th>
                            <th width="500"><font color="black">Responsable</font></th>
                            <th width="150"><font font color="black">Ubicacion</font></th>
                            <th width="150"><font font color="black">Ver</font></th>
                            <th width="100"><font font font color="black">Editar</font></th>
                            
                            <th width="10"><font font font font font color="black">Eliminar</font></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                         $consulta  = "select * from estacionmet";
                             $resultado = $conexion->query($consulta);
                             
                            while($fila= $resultado->fetch_object()){
                            $idm =$fila->id_estacion;
                            $codigom = $fila->codiogestacion;
                            $activam=$fila->activa;
                            $latitudm=$fila->latitud;
                            $longitudm=$fila->longitud;
                            $departamentom=$fila->iddepartamento;
                            $municipiom=$fila->idmunicipio;
                            $responsablem=$fila->idresponsable;
                           
                            ?>
                            <tr>
                                <td><?php echo $codigom; ?></td>
                                <td><?php echo $departamentom; ?></td>
                                <td><?php echo $municipiom; ?></td>
                                <td><?php echo $responsablem; ?></td>
                                <td ><center><button type="button" class="btn btn-success"><i class="fa fa-map"></i></button></center><?php echo $row['genero']; ?></td>
                                
                                <td><!--boton de ver-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <center><a href="#" data-toggle="modal" data-target="#actualizarVisitante" onclick="Editar_visita('<?php echo $duiVisita; ?>','<?php echo $NombreVisita; ?>','<?php echo $generoVisita;?>','<?php echo $tipoVisita;?>','<?php echo $celularVisita;?>','<?php echo $pas;?>')" ><button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button></a></center>
                                
                                    </div>

                                    
                                  </div>
                                  </td>
                                    <td><!--boton de modificar-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" data-toggle="modal" data-target="#actualizarVisitante" onclick="Editar_visita('<?php echo $duiVisita; ?>','<?php echo $NombreVisita; ?>','<?php echo $generoVisita;?>','<?php echo $tipoVisita;?>','<?php echo $celularVisita;?>','<?php echo $pas;?>')" ><button type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                
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
      </div> 
</div><!-- Fin de ROW -->



 
 <!-- MODAL PARA MATAR A UN VISITANTE -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><font font font font color="black">Eliminar Registro</font></h3> 
                </div>

                <div class="panel-body">

                    ¿Seguro que desea eliminar este elemento?
                                       

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok" >Eliminar</a>
                </div> 
            </div>
        </div> 
    </div>          

<?php
include_once 'editarEstacion.php';

?>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e){
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        $('.debug-url').html('Eliminar URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    })
</script>

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
 include "../ProcesoSubir/conexioneq.php";
$bandera          = $_REQUEST["bandera"];
$codigo    = $_REQUEST["codigo"];
$lista1    = $_REQUEST["lista1"];
$lista2    = $_REQUEST["lista2"];
$institucion = $_REQUEST["institucion"];
$imagenEstacion = $_REQUEST["imagen"];
$latitud = $_REQUEST["latitud"];
$longitud = $_REQUEST["longitud"];

if ($bandera == "add") {
  msg("entra a guardar");
    $permitidos = array("image/jpg", "image/jpeg", "image/png");
    $limite_kb  = 16384; //tamanio maximo que permitira subir, es el limite de medium blow(16mb)
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
        //Este es el archivo temporaral.
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        //este es el tipo de archivo
        $tipo = $_FILES['imagen']['type'];
        //leer el archivo temporarl en binario
        $fp   = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //escapar los caracteres
        $data      = mysqli_real_escape_string($conexion, $data);
        
        $consulta  = "INSERT INTO estacionmet VALUES('null','" . $codigo . "','" . $lista1. "','" . $lista2. "','1','" . $data . "','" . $tipo . "','" . $latitud  . "','".$longitud."','".$institucion."')";
        msg($consulta);
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            msg("Exito");
        } else {
           echo mysqli_error($conexion);
        }
    }

}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
}
?>