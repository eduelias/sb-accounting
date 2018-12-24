<?php
$this->breadcrumbs=array(
	'Cad Produtos Tipos'=>array('index'),
	$model->idprodutos_tipo=>array('view','id'=>$model->idprodutos_tipo),
	'Update',
);

$this->menu=array(
	array('label'=>'List cad_produtos_tipo', 'url'=>array('index')),
	array('label'=>'Create cad_produtos_tipo', 'url'=>array('create')),
	array('label'=>'View cad_produtos_tipo', 'url'=>array('view', 'id'=>$model->idprodutos_tipo)),
	array('label'=>'Manage cad_produtos_tipo', 'url'=>array('admin')),
);
?>

<h1>Update cad_produtos_tipo <?php echo $model->idprodutos_tipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>