<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->idusuario=>array('view','id'=>$model->idusuario),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Mostrar', 'url'=>array('view', 'id'=>$model->idusuario)),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Editando Usuario <?php echo $model->idusuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>