<?php
$this->breadcrumbs=array(
	'Cad Produtoses'=>array('index'),
	$model->idprodutos=>array('view','id'=>$model->idprodutos),
	'Update',
);

$this->menu=array(
	array('label'=>'List cad_produtos', 'url'=>array('index')),
	array('label'=>'Create cad_produtos', 'url'=>array('create')),
	array('label'=>'View cad_produtos', 'url'=>array('view', 'id'=>$model->idprodutos)),
	array('label'=>'Manage cad_produtos', 'url'=>array('admin')),
);
?>

<h1>Update cad_produtos <?php echo $model->idprodutos; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>