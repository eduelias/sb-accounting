<h1><?=$this->titulo?></h1>
<?php echo $this->renderPartial('_grid',
	array(
	'model'         => $model,
	'dp'            => $model->cartodas(),
	'buttom'        => '{work}{update}',
	'filtroOrigem'  => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
						null, true,
						array(
							'order'     => 'nome asc'
						))),
	'filtroDestino' => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
						null, true,
						array(
							'order' => 'nome asc',
							'condition' => 'dogrupo'
						))),
	));
?>