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
                $fecha=$_GET['fe'];
                $x=explode("-",$fecha);
                    $mes1=$x[0];
                     $a=$x[1];
                     
                     //validar**********
                     $validar= mysqli_query($mysqli,"SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
                     if(mysqli_num_rows($validar)){
                     
                     
			$extrar= mysqli_query($mysqli,"SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
                        
                         $fechas= mysqli_query($mysqli,"SELECT

l.date
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
                      
			
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
						text: 'Lluvia promedio correspondiente a <?php echo $fecha;?>'
					},
					xAxis: {
						// Le pasamos los datos que irán en el eje de las 'X' en JSON
						categories: [<?php while ($rows= mysqli_fetch_array($fechas)){?>
                                                '<?php echo $rows['date'];?>',<?php } ?>]
					},
					yAxis: {
						title: {
							text: 'Promedio de lluvia'
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
                                                name: 'Promedio',
                                                data:[<?php while ($row= mysqli_fetch_array($extrar)){?>
                                                <?php echo $row['promrainrate'];?>,<?php } ?>]
                                            }]
				});
				
				
			});
				
		</script>
                     <?php } else{ ?>
	</head>
	<body>
		<center><div class="center">NO HAY DATOS ALMACENADOS</div></center>
                <?php }?>
		<div id="container" style="width: 100%; height: 500px; margin: 0 auto"></div>
                <br><br>
                <center><a href="../Reportes/Vista_rainRayte.php">
                         <button type="submit" class="btn btn-success">Regresar</button>
                    </a></center>

		
	</body>
</html>