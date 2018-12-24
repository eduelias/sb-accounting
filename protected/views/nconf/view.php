<?php
$this->breadcrumbs=array(
	'Nconf'=>array('index'),
	$model->autor->nome.': '.$model->nc->descricao,
);

$this->menu=array(
	array('label'=>'Nova', 'url'=>array('create')),
	array('label'=>'NCs de Entrada', 'url'=>array('index')),
	array('label'=>'NCs de Saída', 'url'=>array('indexmine')),
	array('label'=>'Públicas', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>'  [<img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png">]  '),
	array('label'=>'  <img alt="Editar" src="/solbril/assets/d7172ef9/gridview/update.png"> ', 'url'=>array('update', 'id'=>$model->idnconf)),
	array('label'=>' <img alt="Excluir" src="/solbril/assets/d7172ef9/gridview/delete.png"> ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnconf),'confirm'=>'Tem certeza que deseja excluir este item?')),
);
?> 

<h1>Mostrando NC #<?php echo $model->idnconf; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'setor.descricao',
		'autor.nome',
		'alvo.nome',
		'nc.descricao',
		'publica',
		'relevancia',
	),
)); ?>
