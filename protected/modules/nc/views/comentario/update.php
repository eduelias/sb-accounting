<?php
$this->breadcrumbs=array(
	'Comentario'=>array('index'),
	$model->idcomentario=>array('view','id'=>$model->idcomentario),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Comentario', 'url'=>array('index')),
	array('label'=>'Inserir Comentario', 'url'=>array('create')),
	array('label'=>'Mostrar Comentario', 'url'=>array('view', 'id'=>$model->idcomentario)),
	array('label'=>'Gerenciar Comentario', 'url'=>array('admin')),
);
?>

<h1>Editando Comentario <?php echo $model->idcomentario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>