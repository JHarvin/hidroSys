<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Sistema Hidrometeorologico</title>
		
		
                <script type="text/javascript" src="../Highcharts-4.1.5/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="../Highcharts-4.1.5/js/highcharts.js"></script>
		<script type="text/javascript" src="../Highcharts-4.1.5/js/exporting.js"></script>
                <script type="text/javascript" src="../Highcharts-4.1.5/js/themes/grid.js"></script>


		<?php 
                include_once '../ProcesoSubir/conexion.php';
                $po=$_GET['po'];
               
			$extrar= mysqli_query($mysqli,"SELECT

h.level
FROM
hojavisitaspozos h
INNER JOIN pozos p ON h.idpozo = p.idpozo
INNER JOIN municipios m ON p.idmunicipio= m.idmunicipio
WHERE
h.idpozo ='$po'
ORDER BY
h.fechavisita ASC");
//                        while ($pozito= mysqli_fetch_array($extrar)){
//                            $p=$pozito['codigopozo'];
//                            $m=$pozito['municipio'];
//                        }
                        
                         $fechas= mysqli_query($mysqli,""
                                 . "SELECT
h.fechavisita

FROM
hojavisitaspozos h
INNER JOIN pozos p ON h.idpozo = p.idpozo
INNER JOIN municipios m ON p.idmunicipio= m.idmunicipio
WHERE
h.idpozo = 4
ORDER BY
h.fechavisita ASC
");
//para sacar unos datos para la grafica pareciera que es lo mismo pero no JcMoz
                         $datos= mysqli_query($mysqli,"SELECT
p.codigopozo,
m.municipio
FROM
hojavisitaspozos h
INNER JOIN pozos p ON h.idpozo = p.idpozo
INNER JOIN municipios m ON p.idmunicipio= m.idmunicipio
WHERE
h.idpozo ='$po'
ORDER BY
h.fechavisita ASC");
                        while ($pozito= mysqli_fetch_array($datos)){
                            $p=$pozito['codigopozo'];
                            $m=$pozito['municipio'];
                        }
                      
			
		?>
		
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {

				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'line'
					},
					title: {
						text: 'Sistema Hidrometeorologico'
					},
					subtitle: {
						text: 'Nivel de pozo <?php echo $p;?> Municipio: <?php echo $m;?>'
					},
					xAxis: {
						// Le pasamos los datos que irán en el eje de las 'X' en JSON
						categories: [<?php while ($rows= mysqli_fetch_array($fechas)){?>
                                                '<?php echo $rows['fechavisita'];?>',<?php } ?>]
					},
					yAxis: {
						title: {
							text: 'Nivel del pozo'
						}
					},
					tooltip: {
						enabled: true,
						formatter: function() {
							return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': '+ this.y +' '+this.series.name;
						}
					},
					plotOptions: {
						line: {
							dataLabels: {
								enabled: true
							},
							enableMouseTracking: true
						}
					},
					// Le pasamos los datos en JSON
					series:[{
                                                name: 'Nivel',
                                                data:[<?php while ($row= mysqli_fetch_array($extrar)){?>
                                                <?php echo $row['level'];?>,<?php } ?>]
                                            }]
				});
				
				
			});
				
		</script>

	</head>
	<body>
		
		<div id="container" style="width: 100%; height: 500px; margin: 0 auto"></div>
                <br><br>
                <center><a href="../Reportes/Vista_Visita.php">
                         <button type="submit" class="btn btn-success">Regresar</button>
                    </a></center>

		
	</body>
</html>