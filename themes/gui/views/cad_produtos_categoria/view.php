<?php
$this->breadcrumbs=array(
	'Cad Produtos Categorias'=>array('index'),
	$model->idprodutos_categoria,
);

$this->menu=array(
	array('label'=>'List cad_produtos_categoria', 'url'=>array('index')),
	array('label'=>'Create cad_produtos_categoria', 'url'=>array('create')),
	array('label'=>'Update cad_produtos_categoria', 'url'=>array('update', 'id'=>$model->idprodutos_categoria)),
	array('label'=>'Delete cad_produtos_categoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos_categoria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage cad_produtos_categoria', 'url'=>array('admin')),
);
?>

<h1>View cad_produtos_categoria #<?php echo $model->idprodutos_categoria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idprodutos_categoria',
		'idcategoria_pai',
		'descricao',
		'fator_corr',
		'ativo',
	),
)); ?>
