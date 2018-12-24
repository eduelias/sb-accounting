<?php
$this->breadcrumbs=array(
	'Status'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Incluindo'),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Inserindo Status</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>