<?php
$this->breadcrumbs=array(
	'Usuários'=>array('index'),
	$model->idusuario,
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Incluir', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->idusuario)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idusuario),'confirm'=>'Tem certeza que deseja excluir este item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?> 

<h1>Mostrando Usuário #<?php echo $model->login; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idusuario',
		'idclifor',
		'ativo',
		'password',
		'login',
		'seed',
	),
)); ?>
