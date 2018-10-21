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
                $fecha=$_GET['f'];
                $x=explode("-",$fecha);
                    $mes1=$x[0];
                     $a=$x[1];
                     
                     //validar**********
                     $validar= mysqli_query($mysqli,"SELECT
p.id_pozo,
p.codigopozo,
l.date,
avg(l.temperature) as promtemp
FROM
pozos AS p
INNER JOIN lecturapozos AS l ON l.id_pozo= p.id_pozo
where EXTRACT(MONTH FROM l.date)='$mes1' and EXTRACT(YEAR FROM l.date)='$a' and p.id_pozo=$po
GROUP BY p.codigopozo, l.date
ORDER BY l.date");
                     if(mysqli_num_rows($validar)){
                     
                     
			$temperatura= mysqli_query($mysqli,"SELECT
avg(l.temperature) as promtemp
FROM
pozos AS p
INNER JOIN lecturapozos AS l ON l.id_pozo= p.id_pozo
where EXTRACT(MONTH FROM l.date)='$mes1' and EXTRACT(YEAR FROM l.date)='$a' and p.id_pozo=$po
GROUP BY p.codigopozo, l.date
ORDER BY l.date");
                        
                         $fechas= mysqli_query($mysqli,"SELECT
l.date
FROM
pozos AS p
INNER JOIN lecturapozos AS l ON l.id_pozo= p.id_pozo
where EXTRACT(MONTH FROM l.date)='$mes1' and EXTRACT(YEAR FROM l.date)='$a' and p.id_pozo=$po
GROUP BY p.codigopozo, l.date
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
                                                data:[<?php while ($row= mysqli_fetch_array($temperatura)){?>
                                                <?php echo $row['promtemp'];?>,<?php } ?>]
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
                <center><a href="../Reportes/vista_GD.php.php">
                         <button type="submit" class="btn btn-success">Regresar</button>
                    </a></center>

		
	</body>
</html>