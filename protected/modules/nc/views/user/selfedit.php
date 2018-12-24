<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->login=>array('view','id'=>$model->iduser),
	'Editar',
);

$this->menu=array(
	array('label'=>' [<img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png">] '),
);
?>

<h1>Editando meus dados:</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'self'=>true)); ?>