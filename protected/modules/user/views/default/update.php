<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->login=>array('view','id'=>$model->iduser),
	'Editar',
);
 
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label'=>' | '), 
	array('label'=>' <img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png"> ', 'url'=>array('view', 'id'=>$model->iduser)),
	array('label'=>' [<img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png">] '),
	array('label'=>'<img alt="Excluir" src="/solbril/assets/d7172ef9/gridview/delete.png">', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iduser),'confirm'=>'Tem certeza que deseja excluir este item?')),
);
?>

<h1>Editando User "<?php echo $model->login; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>