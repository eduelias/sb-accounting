<?php
$this->breadcrumbs=array(
	'Modelos de NC'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Incluindo'),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Inserindo modelo de NC</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>