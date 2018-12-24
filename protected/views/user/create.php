<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserindo'),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Inserindo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>