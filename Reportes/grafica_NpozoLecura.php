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
                $fe1=$_GET['fe1'];
                $fe2=$_GET['fe2'];
               
			$extrar= mysqli_query($mysqli,"SELECT
Avg(l.level) AS promlevel
FROM
pozos p
INNER JOIN lecturapozos l ON l.idpozo = p.idpozo
INNER JOIN municipios m ON p.idmunicipio = m.idmunicipio
WHERE
l.date>='$fe1' AND
l.date<='$fe2'
GROUP BY
p.codigopozo,
l.date,
m.municipio
ORDER BY
l.date ASC");
//                        while ($pozito= mysqli_fetch_array($extrar)){
//                            $p=$pozito['codigopozo'];
//                            $m=$pozito['municipio'];
//                        }
                        
                         $fechas= mysqli_query($mysqli,"SELECT

l.date
FROM
pozos p
INNER JOIN lecturapozos l ON l.idpozo = p.idpozo
INNER JOIN municipios m ON p.idmunicipio = m.idmunicipio
WHERE
l.date>='$fe1' AND
l.date<='$fe2'
GROUP BY
p.codigopozo,
l.date,
m.municipio
ORDER BY
l.date ASC");
//para sacar unos datos para la grafica pareciera que es lo mismo pero no JcMoz
                         $datos= mysqli_query($mysqli,"SELECT
p.codigopozo,
m.municipio
FROM
pozos p
INNER JOIN lecturapozos l ON l.idpozo = p.idpozo
INNER JOIN municipios m ON p.idmunicipio = m.idmunicipio
WHERE
l.date>='$fe1' AND
l.date<='$fe2'
GROUP BY
p.codigopozo,
l.date,
m.municipio
ORDER BY
l.date ASC");
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
						text: ' Nivel promedio del pozo <?php echo $p;?> del Municipio: <?php echo $m;?> desde <?php echo $fe1;?> hasta <?php echo $fe2;?>'
					},
					xAxis: {
						// Le pasamos los datos que irán en el eje de las 'X' en JSON
						categories: [<?php while ($rows= mysqli_fetch_array($fechas)){?>
                                                '<?php echo $rows['date'];?>',<?php } ?>]
					},
					yAxis: {
						title: {
							text: 'Nivel del pozo (mm)'
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
                                                <?php echo floor($row['promlevel']);?>,<?php } ?>]
                                            }]
				});
				
				
			});
				
		</script>

	</head>
	<body>
		
		<div id="container" style="width: 100%; height: 500px; margin: 0 auto"></div>
                <br><br>
                <center><a href="../Reportes/Vista_nivel_pozoSensor.php">
                         <button type="submit" class="btn btn-success">Regresar</button>
                    </a></center>

		
	</body>
</html>