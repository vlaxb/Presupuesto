<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Ejecución Presupuestal';
?>
<?php $form = ActiveForm::begin([
					"method" => "get",
					'action' => ['site/excel'],
					"id" => "compro-form",
					"enableClientValidation" => false,
					"enableAjaxValidation" => false,
					]); 
					?>
<div class="mod-docs">
	<div class="mod-docs-header bg-teal-std">
	</div>
	<div class="mod-docs-body container">
		<div class="row">
			<div class="box-circle">
				<svg version="1.1" id="circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="400px" height="400px" viewBox="0 0 400 400" enable-background="new 0 0 400 400" xml:space="preserve">
					<path fill="#FFFFFF" d="M400,201H0C0,90,89.543,1,200,1S400,90,400,201z"/>
				</svg>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="box-certingreso-drw">
							<img src="img/certingreso_drw.svg" alt="Ejecución Presupuestal">
						</div>
						<h2 class="fnt__Medium text-center mrg__bottom-20"><?= Html::encode($this->title) ?></h2>
						<div class="row">
							<div class="col-xs-12 col-sm-6 pull-right">
								<div class="row">
									<div class="col-xs-6 col-sm-12">
										<div class="content-ppto__f-hoy">
											<span class="ppto__f-hoy fnt__Medium">Fecha: <?= date("d/m/y")?></span>
										</div>
									</div>
									<div class="col-xs-6 col-sm-12">
										<div class="pull-right">
										
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<p class="ppto__r-social">Razón social: CONSORCIO SAMA</p>
								<p class="ppto__nit fnt__Medium">Nit 900.806.124-1</p>
							</div>
						</div>
						<hr>
						
						<div class="row">
							<div class="col-sm-12">
								<h3 class="text-center">Selecciona el periodo a consultar</h3>
									<div class="row">
										<div class="col-xs-12 col-sm-10 col-sm-offset-1">
											<div class="content-ppto__rango mrg__top-30 text-center">
												<div class="row">
													<div class="col-xs-6">
														<label for="from">Desde</label>
														<div class="form-group">
															<input class="form-control" id="from" name="from" type="text" data-type="date" required="true">
														</div>
													</div>
													<div class="col-xs-6">
														<label for="to">Hasta</label>
														<div class="form-group">
															<input type="text" type="text" data-type="date" id="to" name="to" class="form-control" required="true">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						
						<hr>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
											Opción #1 Plantilla de ejecución de ingreso
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" disabled>
											Opción #2 para generar el reporte
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" disabled>
											Opción #3 para generar el reporte
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" disabled>
											Opción #4 para generar el reporte
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group text-center"><button onclick="Alerta()" class="btn btn-primary btn-raised">Generar</button></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>
