<?php
	$this->title = 'Excel';
	use yii\helpers\Html;

//Inicio de exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=REPORTE_PRESUPUESTO_FILTRO_MES.xls"); //Indica el nombre del archivo resultante
header("Pragma: no-cache");
header("Expires: 0");


$table = "<table cellpadding='0' cellspacing='0' id='sheet0' border='0'>";
$posicionamiento = 6;	
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php //var_dump($cabFiltroMes)

	
	
?>

<table class="table table-bordered">	
	<?php foreach ($cabFiltroMes as $key): ?>
		<thead>		
			<tr style = 'font-weight:bold'>
				<th class="text-center"><?=$key['EMPRESA']?></th>
			</tr>
			<tr>
				<th></th>
			</tr>
			<tr style = 'font-weight:bold'>
				<th class="text-center"><?=$key['NOMBRE_REPORTE']?></th>
			</tr>
			<tr>
				<th></th>
			</tr>	
			<tr>
				<th class="text-center">REPRESENTANTE</th>
				<th class="text-center">NIT</th>
				<th class="text-center">VIGENCIA</th>
				<th class="text-center">FECHA</th>
				<th class="text-center">PERIODO DE INICIO DEL REPORTE</th>
				<th class="text-center">PERIODO DE FIN DEL REPORTE</th>
				<th class="text-center"><?=utf8_decode($key['TITULO'])?></th>
				<th class="text-center">MODALIDAD</th>
			</tr>			
		</thead>
		<tbody>
			<tr>
				<td class="text-center"><?=utf8_decode($key['REPRESENTANTE'])?></td>
				<td class="text-center"><?=utf8_decode($key['NIT'])?></td>
				<td class="text-center"><?=utf8_decode($key['VIGENCIA'])?></td>
				<td class="text-center"><?=utf8_decode($key['FECHA_HOY'])?></td>
				<td class="text-center"><?=utf8_decode($key['FECHA_INI'])?></td>
				<td class="text-center"><?=utf8_decode($key['FECHA_FIN'])?></td>
				<td class="text-center"><?=utf8_decode($key['FUERZA'])?></td>
				<td class="text-center"><?=utf8_decode($key['MODALIDAD'])?></td>
			</tr>
		</tbody>
	<?php endforeach ?>					
</table>

<br>

<table class="table table-bordered table-striped" style="text-align: center;">
	<thead>		
		<tr style="background:#8BC34A; color:#000; font-weight:bold">
			<?php for ($i = 0; $i < $cantidad; $i++){ ?>				
				<?php if (($i > 5 and $i < ($cantidad-3))): ?>
					<?php if (($i == $posicionamiento)): ?>
						<th class="text-center" colspan="3"><?=utf8_decode($NombreColExc2[$i])?></th>
						<?php $posicionamiento = $posicionamiento+3; ?>
					<?php endif ?>					
				<?php else: ?>
					<th></th>
				<?php endif ?>
			<?php } ?>
		</tr>
		<tr style="background:#8BC34A; color:#000; font-weight:bold">
			<?php for ($i = 0; $i < $cantidad; $i++){ ?>				
				<th class="text-center"><?=utf8_decode($nombreColExc[$i])?></th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($spPreosuFil as $key): ?>
			<tr class="divider">
				<?php for ($i = 0; $i < $cantidad; $i++){ ?>
					<?php if (is_numeric($key[$columnas[$i]])): ?>
						<td><?=utf8_decode(str_replace (".",",",$key[$columnas[$i]]))?></td>
					<?php else: ?>
						<td><?=utf8_decode($key[$columnas[$i]])?></td>
					<?php endif ?>							
				<?php } ?>
			</tr>
		<?php endforeach ?>		
	</tbody>
</table>