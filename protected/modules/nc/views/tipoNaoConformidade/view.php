<?php
$this->breadcrumbs=array(
	'modelos de NC'=>array('index'),
	$model->idnconf,
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Incluir', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>'  [<img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png">]  '),
	array('label'=>'  <img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png"> ', 'url'=>array('update', 'id'=>$model->idnconf)),
	array('label'=>' <img alt="Excluir" src="/solbril/assets/d7172ef9/gridview/delete.png"> ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnconf),'confirm'=>'Tem certeza que deseja excluir este item?')),
);
?> 

<h1>Mostrando modelo de NC número <?php echo $model->idnconf; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnconf',
		'descricao',
	),
)); ?>
