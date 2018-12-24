<?php
$this->breadcrumbs=array(
	'Fluxo'=>array('index'),
	$model->idfluxo,
);
$str = 'cap';

if ($model->idempresaDestino->dogrupo) {
	$str = 'car';
}

$this->menu = array(
	array('label'=>'Nova', 'url'=>array($str.'create')),
	array('label'=>'Baixa', 'url'=>array($str.'index')),
	array('label'=>'Historico', 'url'=>array($str.'historico')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idfluxo)),
	//array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idfluxo),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idfluxo',
array(
			'label' => 'User',
			'type' => 'raw',
			'value' => $model->iduser0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->iduser0)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->iduser0, true))) : null,
			),
array(
			'label' => 'Empresa Pagadora',
			'type' => 'raw',
			'value' => $model->idempresaOrigem !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idempresaOrigem)), array('empresa/view', 'id' => GxActiveRecord::extractPkValue($model->idempresaOrigem, true))) : null,
			),
array(
			'label' => 'Empresa Recebedora',
			'type' => 'raw',
			'value' => $model->idempresaDestino !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idempresaDestino)), array('empresa/view', 'id' => GxActiveRecord::extractPkValue($model->idempresaDestino, true))) : null,
			),
array(
			'label' => 'Conta',
			'type' => 'raw',
			'value' => $model->idconta0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idconta0)), array('conta/view', 'id' => GxActiveRecord::extractPkValue($model->idconta0, true))) : null,
			),
array(
			'label' => 'Centro de Custo',
			'type' => 'raw',
			'value' => $model->idccusto0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idccusto0)), array('ccusto/view', 'id' => GxActiveRecord::extractPkValue($model->idccusto0, true))) : null,
			),
array(
			'label' => 'Usuário que deu baixa',
			'type' => 'raw',
			'value' => $model->iduserPgto != null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->iduserPgto)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->iduserPgto, true))) : 'Não foi paga ainda',
			),
array(
			'label' => 'Forma de Pagamento',
			'type' => 'raw',
			'value' => $model->idIdformaspg !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idIdformaspg)), array('formaspg/view', 'id' => GxActiveRecord::extractPkValue($model->idIdformaspg, true))) : null,
			),
'data_sistema',
'data_faturamento',
'data_vencimento',
'data_pagamento',
'doc_numero',
'valor_fatura',
'valor_pagamento',
'valor_multa',
'valor_juros',
'observacao',
'filename',
	),
)); echo $model->iduser_pgto; ?>

