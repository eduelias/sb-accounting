<?php
$this->breadcrumbs=array(
	'Cad Clifor Tipo'=>array('index'),
	$model->idtipo,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idtipo)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtipo),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idtipo',
'descricao',
	),
)); ?>

<h2>Cad Clifors</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->cadClifors as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadClifor/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>