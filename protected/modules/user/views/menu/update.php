<?php
$this->breadcrumbs=array(
	'Menu'=>array('index'),
	$model->idmenu=>array('view','id'=>$model->idmenu),
	'Editar',
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Publicas', 'url'=>array('admin')),
	array('label'=>' | '), 
	array('label'=>' Ver  ', 'url'=>array('view', 'id'=>$model->idmenu)),
	array('label'=>' [Editar] '),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmenu),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>

<h1>Editando Menu <?php echo $model->idmenu; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>