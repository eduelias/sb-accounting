<?php
$this->breadcrumbs=array(
	'Menu'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'[Inserir]'),
	array('label'=>'Admin', 'url'=>array('admin')),
);
?>

<h1>Inserindo Menu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>