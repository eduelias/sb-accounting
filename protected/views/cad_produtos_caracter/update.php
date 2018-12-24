<?php
$this->breadcrumbs=array(
	'Cad Produtos Caracters'=>array('index'),
	$model->idprodutos_caracter=>array('view','id'=>$model->idprodutos_caracter),
	'Update',
);

$this->menu=array(
	array('label'=>'List cad_produtos_caracter', 'url'=>array('index')),
	array('label'=>'Create cad_produtos_caracter', 'url'=>array('create')),
	array('label'=>'View cad_produtos_caracter', 'url'=>array('view', 'id'=>$model->idprodutos_caracter)),
	array('label'=>'Manage cad_produtos_caracter', 'url'=>array('admin')),
);
?>

<h1>Update cad_produtos_caracter <?php echo $model->idprodutos_caracter; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>