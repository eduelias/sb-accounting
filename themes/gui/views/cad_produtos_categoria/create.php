<?php
$this->breadcrumbs=array(
	'Cad Produtos Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List cad_produtos_categoria', 'url'=>array('index')),
	array('label'=>'Manage cad_produtos_categoria', 'url'=>array('admin')),
);
?>

<h1>Create cad_produtos_categoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>