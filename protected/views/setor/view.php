<?php
$this->breadcrumbs=array(
	'Setor'=>array('index'),
	$model->idsetor,
);

$this->menu=array(
	array('label'=>'Listar Setor', 'url'=>array('index')),
	array('label'=>'Incluir Setor', 'url'=>array('create')),
	array('label'=>'Editar Setor', 'url'=>array('update', 'id'=>$model->idsetor)),
	array('label'=>'Excluir Setor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsetor),'confirm'=>'Tem certeza que deseja excluir este item?')),
	array('label'=>'Gerenciar Setor', 'url'=>array('admin')),
);
?> 

<h1>Mostrando Setor "<?php echo $model->descricao; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'descricao',
		'responsavel.nome',
		
	),
)); ?>
