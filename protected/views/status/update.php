<?php
$this->breadcrumbs=array(
	'Status'=>array('index'),
	$model->idstatus=>array('view','id'=>$model->idstatus),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label'=>' | '), 
	array('label'=>' <img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png">  ', 'url'=>array('view', 'id'=>$model->idstatus)),
	array('label'=>' [<img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png">] '),
	array('label'=>'  <img alt="Excluir" src="/solbril/assets/d7172ef9/gridview/delete.png"> ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idstatus),'confirm'=>'Tem certeza que deseja excluir este item?')),
);
?>

<h1>Editando Status <?php echo $model->idstatus; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>