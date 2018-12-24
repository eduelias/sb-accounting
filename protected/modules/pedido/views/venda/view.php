<?php
$this->breadcrumbs=array(
	'Fluxo'=>array('index'),
	$model->idfluxo,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idfluxo)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idfluxo),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idfluxo',
array(
			'label' => '',
			'type' => 'raw',
			'value' => $model->idfluxoForma !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idfluxoForma)), array('/view', 'id' => GxActiveRecord::extractPkValue($model->idfluxoForma, true))) : null,
			),
array(
			'label' => '',
			'type' => 'raw',
			'value' => $model->idclifor0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idclifor0)), array('/view', 'id' => GxActiveRecord::extractPkValue($model->idclifor0, true))) : null,
			),
array(
			'label' => '', 
			'type' => 'raw',
			'value' => $model->idusuario0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idusuario0)), array('/view', 'id' => GxActiveRecord::extractPkValue($model->idusuario0, true))) : null,
			),
'ativo:boolean',
'previsao:boolean',
'data_cadastro',
	),
)); ?>

