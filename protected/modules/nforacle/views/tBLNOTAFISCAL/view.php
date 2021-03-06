<?php
$this->breadcrumbs=array(
	'Tblnotafiscal'=>array('index'),
	$model->IDNOTAFISCAL,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->IDNOTAFISCAL)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDNOTAFISCAL),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?> 

<h1>Mostrando TBLNOTAFISCAL #<?php echo $model->IDNOTAFISCAL; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDNOTAFISCAL',
		'E_S',
		'IDTIPONF',
		'SERIE',
		'NUMNOTA',
		'NUMFOLHA',
		'NOTA_FATURA',
		'IDNATOPERACAO',
		'QUANTIDADE',
		'DATAEMISSAO',
		'ESPECIE',
		'DATAENTRADASAIDA',
		'MARCA',
		'NUMERO',
		'IDCONDPAG',
		'PESOBRUTO',
		'PESO_LIQUIDO',
		'PLACAVEICTRANSP',
		'IDTIPOFRETE',
		'DSCCOMPLEMENTAR',
		'IDDESTINATARIO_EMITENTE',
		'ID_TRANSPORTADORA',
		'NUM_CONTROL_FORM',
		'IMPRESSA',
		'CANCELADA',
		'MOTIVO_CANCELAMENTO',
		'DATAHORA_CANC',
		'IDEMPRESA',
		'QUANTIDADE_OR',
		'STATUS',
		'CANHOTO',
		'DATA_CANHOTO',
		'OBS_CANHOTO',
		'ID_USUARIO',
		'ID_MOTORISTA',
		'IDNOTAFISCALORIGEM',
		'DATA_INCLUSAO',
		'NFE_LOTE',
		'NFE_PROTOCOLO',
		'NFE_DATA_PROCESSAMENTO',
		'NFE_CHAVE',
		'NFE_ERRO',
		'NFE_STATUS',
		'NFE_MOTIVO',
		'MODELO',
		'NFE_CMD',
	),
)); ?>
