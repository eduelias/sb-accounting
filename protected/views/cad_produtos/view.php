<?php
$this->breadcrumbs=array(
	'Cad Produtoses'=>array('index'),
	$model->idprodutos,
);

$this->menu=array(
	array('label'=>'List cad_produtos', 'url'=>array('index')),
	array('label'=>'Create cad_produtos', 'url'=>array('create')),
	array('label'=>'Update cad_produtos', 'url'=>array('update', 'id'=>$model->idprodutos)),
	array('label'=>'Delete cad_produtos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage cad_produtos', 'url'=>array('admin')),
);
?>

<h1>View cad_produtos #<?php echo $model->idprodutos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idprodutos',
		'idunidade',
		'idprodutos_categoria',
		'idusuario',
		'idprodutos_tipo',
		'idprodutos_descricao',
		'idprodutos_validade',
		'nomeprod',
		'desc_max',
		'desc_min',
		'qtde_min',
		'data_atualizacao',
		'data_cadastro',
		'ativo',
	),
)); ?>
