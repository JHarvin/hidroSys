<?php
    require "../../ProcesoSubir/conexioneq.php"; 
    if(isset($_POST['id'])){
    $id = $_POST['id'];
    $consulta  = "SELECT * FROM respestaciones WHERE idresponsable=".$id;
    $result = $conexion->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
            $institucion=$fila->institucion;
            $responsable=$fila->responsable;
            $direccion=$fila->direccion;
            $telefono1=$fila->telefono1;
            $telefono2=$fila->telefono2;
            $foto=$fila->foto;
            $foto1="data:image/*;base64,".base64_encode($foto);
            
        }//fin while
      }
    }
?>
<!-- <img height="70px" src="<?php //echo $foto1?>"/> -->
<!-- <img height="70px" src="data:image/*;base64,<?php // echo base64_encode($result2["foto"]);?>"/> -->

<!--inicia el div para capturar la imagen -->
<div class="form-group " align="center" >
                          <label for="control-label" for="foto">Foto</label>
                          <div name="preview" id="preview" class="thumbnail">
                            <a href="#" id="file-select" class="btn btn-success"><span class="fa fa-camera">&nbsp;&nbsp;&nbsp;</span>Elegir archivo</a>
                            <?php if($foto==""){ ?>
                            <img id="imagen" name="imagen" src="../images/img2.png"/>
                            <?php }else{ ?>
                              <img id="imagen" name="imagen" src="<?php echo $foto1 ?>"/>
                            <?php } ?>
                          </div>

                            <div id="file-submit" >
                              <input id="file" name="file" type="file" accept="image/jpeg,image/jpg,image/png"/>
                              <span class="help-block" id="error"></span>
                            </div> 
                          </div><br>
                        <!--finaliza el div para capturar la imagen -->
                        
                        <div class="form-group " >
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="institucion">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instituci&oacute;n: <span style="color:	#000080;"> '</span>
                          </label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text"  value="<?php echo $institucion; ?>" class="form-control col-md-7 col-xs-12" disabled>
                          </div>
                        </div><br><br><br>
                        <div class="row col-lg-12 col-sm-offset-2 col-md-8 col-md-offset-2 ">
                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <label for="responsable">Responsable: <span style="color:	#000080;"> '</span>
                          </label>
                          <div >
                            <input type="text" value="<?php echo $responsable; ?>" class="form-control col-md-7 col-xs-12" disabled>
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <label for="direccion">Direcci&oacute;n: <span style="color:	#000080;"> '</span>
                          </label>
                          <div >
                            <input type="text"  value="<?php echo $direccion; ?>" class="form-control col-md-7 col-xs-12" disabled>
                          </div>
                        </div>
                        </div>
                        <br><br><br><br><br>
                        <div class="row col-lg-12 col-sm-offset-2 col-md-8 col-md-offset-2 ">
                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <label for="telefono1">Tel&eacute;fono 1: <span style="color:	#000080;"> '</span>
                          </label>
                          <div >
                            <input type="text" value="<?php echo $telefono1; ?>" class="form-control col-md-7 col-xs-12" disabled>
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <label  for="telefono2">Tel&eacute;fono 2: <span style="color:	#000080;"> '</span>
                          </label>
                          <div>
                            <input  value="<?php echo $telefono2; ?>" class="form-control col-md-7 col-xs-12" disabled>
                          </div>
                        </div>
                        </div>
                        <br><br><br><br><br>
                          
                       
                       
