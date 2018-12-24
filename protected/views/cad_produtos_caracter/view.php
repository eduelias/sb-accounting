<?php
$this->breadcrumbs=array(
	'Cad Produtos Caracters'=>array('index'),
	$model->idprodutos_caracter,
);

$this->menu=array(
	array('label'=>'List cad_produtos_caracter', 'url'=>array('index')),
	array('label'=>'Create cad_produtos_caracter', 'url'=>array('create')),
	array('label'=>'Update cad_produtos_caracter', 'url'=>array('update', 'id'=>$model->idprodutos_caracter)),
	array('label'=>'Delete cad_produtos_caracter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos_caracter),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage cad_produtos_caracter', 'url'=>array('admin')),
);
?>

<h1>View cad_produtos_caracter #<?php echo $model->idprodutos_caracter; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idprodutos_caracter',
		'idprodutos',
		'dim_x',
		'dim_y',
		'dim_z',
		'peso_bruto',
		'peso_liquido',
	),
)); ?>
