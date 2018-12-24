<?php
$this->breadcrumbs=array(
	'Cad Usuario'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar CadUsuario', 'url'=>array('index')),
	array('label'=>'Gerenciar CadUsuario', 'url'=>array('admin')),
);
?>

<h1>Inserindo Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>