<?php
$this->breadcrumbs=array(
	'Menu'=>array('index'),
	$model->idmenu,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Publicas', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idmenu)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmenu),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?> 

<h1>Mostrando Menu #<?php echo $model->idmenu; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmenu',
		'label',
		'url',
		'idmenu_pai',
		'visible',
		'posicao',
		'imagem',
		'url_tipo',
	),
)); ?>
