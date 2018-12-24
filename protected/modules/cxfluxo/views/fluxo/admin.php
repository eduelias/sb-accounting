<?php
$this->breadcrumbs=array(
	'Fluxo'=>array('index'),
	'Admin',
);

$this->menu=array(
	array('label'=>'Baixa', 'url'=>array('index')),
	array('label'=>'Inserir Contas a Receber', 'url'=>array('createReceber')),
	array('label'=>'Inserir Contas a Pagar', 'url'=>array('createPagar')),
	array('label'=>'[Admin]')
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('fluxo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<p>
Podem ser usados símbolos de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) no inicio de cada termo para definir como será feita a busca.
</p>

<?php echo GxHtml::link(Yii::t('yii', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'fluxo-grid',
	'dataProvider' => $model->search(false),
	'filter' => $model,
	'columns' => array(
		array(
				'name'=>'idempresa_origem',
				'value'=>'GxHtml::valueEx($data->idempresaOrigem)',
				'filter'=>GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idempresa_destino',
				'value'=>'GxHtml::valueEx($data->idempresaDestino)',
				'filter'=>GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idconta',
				'value'=>'GxHtml::valueEx($data->idconta0)',
				'filter'=>GxHtml::listDataEx(Conta::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idccusto',
				'value'=>'GxHtml::valueEx($data->idccusto0)',
				'filter'=>GxHtml::listDataEx(Ccusto::model()->findAllAttributes(null, true)),
				),
		//'data_sistema',
		'data_faturamento',
		//'data_vencimento',
		//'data_pagamento',
		//'data_cancelado',
		'doc_numero',
		'valor_fatura',
		//'valor_pagamento',
		//'valor_multa',
		//'valor_juros',
		'observacao',
		//'iduser_pgto',
		//'id_sisfat',
		//'tipo_sisfat',
		//'filename',
		//*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>