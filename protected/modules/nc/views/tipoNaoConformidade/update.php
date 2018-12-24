<?php
$this->breadcrumbs=array(
	'Modelos de NC'=>array('index'),
	$model->idnconf=>array('view','id'=>$model->idnconf),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label'=>' | '), 
	array('label'=>' <img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png">  ', 'url'=>array('view', 'id'=>$model->idnconf)),
	array('label'=>' [<img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png">] '),
	array('label'=>'  <img alt="Excluir" src="/solbril/assets/d7172ef9/gridview/delete.png"> ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnconf),'confirm'=>'Tem certeza que deseja excluir este item?')),
);
?>

<h1>Editando modelo de NC Número <?php echo $model->idnconf; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>