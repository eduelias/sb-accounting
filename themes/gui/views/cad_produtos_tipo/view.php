<?php
$this->breadcrumbs=array(
	'Cad Produtos Tipos'=>array('index'),
	$model->idprodutos_tipo,
);

$this->menu=array(
	array('label'=>'List cad_produtos_tipo', 'url'=>array('index')),
	array('label'=>'Create cad_produtos_tipo', 'url'=>array('create')),
	array('label'=>'Update cad_produtos_tipo', 'url'=>array('update', 'id'=>$model->idprodutos_tipo)),
	array('label'=>'Delete cad_produtos_tipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos_tipo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage cad_produtos_tipo', 'url'=>array('admin')),
);
?>

<h1>View cad_produtos_tipo #<?php echo $model->idprodutos_tipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idprodutos_tipo',
		'descricao',
	),
)); ?>
