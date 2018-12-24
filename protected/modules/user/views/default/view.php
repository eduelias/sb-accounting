<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Incluir', 'url'=>array('create')),	
	array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [<img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png">] '),
	array('label'=>' <img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png"> ', 'url'=>array('update', 'id'=>$model->iduser)),
	array('label'=>' <img alt="Excluir" src="/solbril/assets/d7172ef9/gridview/delete.png"> ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iduser),'confirm'=>'Tem certeza que deseja excluir este item?')),
);
?> 

<h1>Detalhes de "<?php echo $model->nome; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'login',
		'nome',
		'email',
	),
)); ?>
