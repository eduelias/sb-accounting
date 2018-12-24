<?php
$this->breadcrumbs=array(
	'Cad Produtos Tipos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List cad_produtos_tipo', 'url'=>array('index')),
	array('label'=>'Manage cad_produtos_tipo', 'url'=>array('admin')),
);
?>

<h1>Create cad_produtos_tipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>