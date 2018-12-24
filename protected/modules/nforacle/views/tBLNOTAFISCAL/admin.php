<?php
$this->breadcrumbs=array(
	'Tblnotafiscal'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'[Admin]')
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tblnotafiscal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciando Tblnotafiscals</h1>

<p>
Podem ser usados símbolos de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) no inicio de cada termo para definir como será feita a busca.
</p>

<?php echo CHtml::link('Pesquisa avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tblnotafiscal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'IDNOTAFISCAL',
		'E_S',
		//'IDTIPONF',
		'SERIE',
		'NUMNOTA',
		//'NUMFOLHA',
		//'NOTA_FATURA',
		//'IDNATOPERACAO',
		//'QUANTIDADE',
		'DATAEMISSAO',
		//'ESPECIE',
		//'DATAENTRADASAIDA',
		//'MARCA',
		//'NUMERO',
		//'IDCONDPAG',
		//'PESOBRUTO',
		//'PESO_LIQUIDO',
		//'PLACAVEICTRANSP',
		//'IDTIPOFRETE',
		'DSCCOMPLEMENTAR',
		'IDDESTINATARIO_EMITENTE',
		//'ID_TRANSPORTADORA',
		//'NUM_CONTROL_FORM',
		//'IMPRESSA',
		'CANCELADA',
		'MOTIVO_CANCELAMENTO',
		'DATAHORA_CANC',
		'IDEMPRESA',
		//'QUANTIDADE_OR',
		'STATUS',
		//'CANHOTO',
		//'DATA_CANHOTO',
		//'OBS_CANHOTO',
		//'ID_USUARIO',
		//'ID_MOTORISTA',
		//'IDNOTAFISCALORIGEM',
		'DATA_INCLUSAO',
		//'NFE_LOTE',
		//'NFE_PROTOCOLO',
		//'NFE_DATA_PROCESSAMENTO',
		//'NFE_CHAVE',
		//'NFE_ERRO',
		'NFE_STATUS',
		//'NFE_MOTIVO',
		//'MODELO',
		//'NFE_CMD',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
