<?php

$opcion=$_GET["opcion"];
$criterio=$_GET["criterio"];


if ($opcion =="buscarMunicipio") {
	# code...

	$existe=true;
	include"comunidadConexion.php";

	$result = $mysqli->query("select * from municipios where iddepto='$criterio'");


	if ($result) {
		# code...
		$existe=false;
	?>
                        <div class="" id="buscarMunicipio">
                          <select class="form-control" id="municipio" name="municipio" onchange="buscarO(this.value)">
                            <option value="0">Municipio</option>
                             <?php  while ($valores = mysqli_fetch_array($result)) {
          echo "<option value=".$valores['idmunicipio'].">".$valores['nombremunicipio']."</option>";}
                      ?>
                            </select>
                        </div>

 <?php

	}if ($existe) {
echo '<div class="" id="buscarMunicipio">
                          <select class="form-control" id="municipio" name="municipio" onchange="buscarO(this.value)">
                            <option value="0">Municipio</option>
                            </select>
                        </div>' ;

	}
	

}





?>