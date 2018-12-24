<?php
$this->breadcrumbs=array(
	'Setor'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar Setor', 'url'=>array('index')),
	array('label'=>'Gerenciar Setor', 'url'=>array('admin')),
);
?>

<h1>Inserindo Setor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>