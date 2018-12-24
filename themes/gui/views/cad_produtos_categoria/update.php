<?php
$this->breadcrumbs=array(
	'Cad Produtos Categorias'=>array('index'),
	$model->idprodutos_categoria=>array('view','id'=>$model->idprodutos_categoria),
	'Update',
);

$this->menu=array(
	array('label'=>'List cad_produtos_categoria', 'url'=>array('index')),
	array('label'=>'Create cad_produtos_categoria', 'url'=>array('create')),
	array('label'=>'View cad_produtos_categoria', 'url'=>array('view', 'id'=>$model->idprodutos_categoria)),
	array('label'=>'Manage cad_produtos_categoria', 'url'=>array('admin')),
);
?>

<h1>Update cad_produtos_categoria <?php echo $model->idprodutos_categoria; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>