<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDNOTAFISCAL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDNOTAFISCAL), array('view', 'id'=>$data->IDNOTAFISCAL)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('E_S')); ?>:</b>
	<?php echo CHtml::encode($data->E_S); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDTIPONF')); ?>:</b>
	<?php echo CHtml::encode($data->IDTIPONF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SERIE')); ?>:</b>
	<?php echo CHtml::encode($data->SERIE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMNOTA')); ?>:</b>
	<?php echo CHtml::encode($data->NUMNOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMFOLHA')); ?>:</b>
	<?php echo CHtml::encode($data->NUMFOLHA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOTA_FATURA')); ?>:</b>
	<?php echo CHtml::encode($data->NOTA_FATURA); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IDNATOPERACAO')); ?>:</b>
	<?php echo CHtml::encode($data->IDNATOPERACAO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QUANTIDADE')); ?>:</b>
	<?php echo CHtml::encode($data->QUANTIDADE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATAEMISSAO')); ?>:</b>
	<?php echo CHtml::encode($data->DATAEMISSAO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESPECIE')); ?>:</b>
	<?php echo CHtml::encode($data->ESPECIE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATAENTRADASAIDA')); ?>:</b>
	<?php echo CHtml::encode($data->DATAENTRADASAIDA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MARCA')); ?>:</b>
	<?php echo CHtml::encode($data->MARCA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMERO')); ?>:</b>
	<?php echo CHtml::encode($data->NUMERO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDCONDPAG')); ?>:</b>
	<?php echo CHtml::encode($data->IDCONDPAG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PESOBRUTO')); ?>:</b>
	<?php echo CHtml::encode($data->PESOBRUTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PESO_LIQUIDO')); ?>:</b>
	<?php echo CHtml::encode($data->PESO_LIQUIDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLACAVEICTRANSP')); ?>:</b>
	<?php echo CHtml::encode($data->PLACAVEICTRANSP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDTIPOFRETE')); ?>:</b>
	<?php echo CHtml::encode($data->IDTIPOFRETE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DSCCOMPLEMENTAR')); ?>:</b>
	<?php echo CHtml::encode($data->DSCCOMPLEMENTAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDDESTINATARIO_EMITENTE')); ?>:</b>
	<?php echo CHtml::encode($data->IDDESTINATARIO_EMITENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TRANSPORTADORA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_TRANSPORTADORA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUM_CONTROL_FORM')); ?>:</b>
	<?php echo CHtml::encode($data->NUM_CONTROL_FORM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMPRESSA')); ?>:</b>
	<?php echo CHtml::encode($data->IMPRESSA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CANCELADA')); ?>:</b>
	<?php echo CHtml::encode($data->CANCELADA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MOTIVO_CANCELAMENTO')); ?>:</b>
	<?php echo CHtml::encode($data->MOTIVO_CANCELAMENTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATAHORA_CANC')); ?>:</b>
	<?php echo CHtml::encode($data->DATAHORA_CANC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDEMPRESA')); ?>:</b>
	<?php echo CHtml::encode($data->IDEMPRESA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QUANTIDADE_OR')); ?>:</b>
	<?php echo CHtml::encode($data->QUANTIDADE_OR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CANHOTO')); ?>:</b>
	<?php echo CHtml::encode($data->CANHOTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATA_CANHOTO')); ?>:</b>
	<?php echo CHtml::encode($data->DATA_CANHOTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OBS_CANHOTO')); ?>:</b>
	<?php echo CHtml::encode($data->OBS_CANHOTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_MOTORISTA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_MOTORISTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDNOTAFISCALORIGEM')); ?>:</b>
	<?php echo CHtml::encode($data->IDNOTAFISCALORIGEM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATA_INCLUSAO')); ?>:</b>
	<?php echo CHtml::encode($data->DATA_INCLUSAO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_LOTE')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_LOTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_PROTOCOLO')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_PROTOCOLO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_DATA_PROCESSAMENTO')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_DATA_PROCESSAMENTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_CHAVE')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_CHAVE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_ERRO')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_ERRO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_MOTIVO')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_MOTIVO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MODELO')); ?>:</b>
	<?php echo CHtml::encode($data->MODELO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NFE_CMD')); ?>:</b>
	<?php echo CHtml::encode($data->NFE_CMD); ?>
	<br />

	*/ ?>

</div>