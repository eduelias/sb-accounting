<?php
$this->breadcrumbs=array(
	'Ccusto'=>array('index'),
	$model->idccusto,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idccusto)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idccusto),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idccusto',
'descricao',
	),
)); ?>

<h2>Fluxos</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->fluxos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('fluxo/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>