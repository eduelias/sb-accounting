<?php
$this->breadcrumbs=array(
	'Cad Produtos Caracters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List cad_produtos_caracter', 'url'=>array('index')),
	array('label'=>'Manage cad_produtos_caracter', 'url'=>array('admin')),
);
?>

<h1>Create cad_produtos_caracter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>