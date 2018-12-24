<?php
$this->breadcrumbs=array(
	'Fluxo Arquivo'=>array('index'),
	$model->idfluxo_arquivo,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idfluxo_arquivo)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idfluxo_arquivo),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idfluxo_arquivo',
array(
			'label' => 'Arquivo',
			'type' => 'raw',
			'value' => $model->idarquivo0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idarquivo0)), array('arquivo/view', 'id' => GxActiveRecord::extractPkValue($model->idarquivo0, true))) : null,
			),
array(
			'label' => 'Fluxo',
			'type' => 'raw',
			'value' => $model->idfluxo0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idfluxo0)), array('fluxo/view', 'id' => GxActiveRecord::extractPkValue($model->idfluxo0, true))) : null,
			),
'data',
'descricao',
	),
)); ?>

