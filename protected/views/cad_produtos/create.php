<?php
$this->breadcrumbs=array(
	'Cad Produtoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List cad_produtos', 'url'=>array('index')),
	array('label'=>'Manage cad_produtos', 'url'=>array('admin')),
);
?>

<h1>Create cad_produtos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>