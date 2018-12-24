<?php
$this->breadcrumbs=array(
	'Cad Produtos Categoria'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'[Inserir]'),
	array('label'=>'Admin', 'url'=>array('admin')),
);
?>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>