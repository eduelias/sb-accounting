<?php
$this->breadcrumbs=array(
	'Cadastro de Produtos',
);

$this->menu=array(
	array('label'=>'[Listar]'),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Admin', 'url'=>array('admin')),
);
?>
<?php
$this->renderPartial('_grid', array(
		'model' => $model));
?>