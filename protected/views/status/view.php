<?php
$this->breadcrumbs=array(
	'Status'=>array('index'),
	$model->idstatus,
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Incluir', 'url'=>array('create')),
	//array('label'=>'Editar Status', 'url'=>array('update', 'id'=>$model->idstatus)),
	//('label'=>'Excluir Status', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idstatus),'confirm'=>'Tem certeza que deseja excluir este item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>'  [<img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png">]  '),
	array('label'=>'  <img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png"> ', 'url'=>array('update', 'id'=>$model->idstatus)),
	array('label'=>' <img alt="Excluir" src="/solbril/assets/d7172ef9/gridview/delete.png"> ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idstatus),'confirm'=>'Tem certeza que deseja excluir este item?')),
);
?> 

<h1>Mostrando Status #<?php echo $model->idstatus; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idstatus',
		'descricao',
		'envia_email',
	),
)); ?>
