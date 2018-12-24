<?php
$this->breadcrumbs=array(
	'Setor'=>array('index'),
	$model->idsetor=>array('view','id'=>$model->idsetor),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Setor', 'url'=>array('index')),
	array('label'=>'Inserir Setor', 'url'=>array('create')),
	array('label'=>'Mostrar Setor', 'url'=>array('view', 'id'=>$model->idsetor)),
	array('label'=>'Gerenciar Setor', 'url'=>array('admin')),
);
?>

<h1>Editando Setor <?php echo $model->idsetor; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>