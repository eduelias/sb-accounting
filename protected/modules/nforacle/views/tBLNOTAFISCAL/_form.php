<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblnotafiscal-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'E_S'); ?>
		<?php echo $form->textField($model,'E_S',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'E_S'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDTIPONF'); ?>
		<?php echo $form->textField($model,'IDTIPONF'); ?>
		<?php echo $form->error($model,'IDTIPONF'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SERIE'); ?>
		<?php echo $form->textField($model,'SERIE',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'SERIE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NUMNOTA'); ?>
		<?php echo $form->textField($model,'NUMNOTA'); ?>
		<?php echo $form->error($model,'NUMNOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NUMFOLHA'); ?>
		<?php echo $form->textField($model,'NUMFOLHA'); ?>
		<?php echo $form->error($model,'NUMFOLHA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NOTA_FATURA'); ?>
		<?php echo $form->textField($model,'NOTA_FATURA',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'NOTA_FATURA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDNATOPERACAO'); ?>
		<?php echo $form->textField($model,'IDNATOPERACAO'); ?>
		<?php echo $form->error($model,'IDNATOPERACAO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'QUANTIDADE'); ?>
		<?php echo $form->textField($model,'QUANTIDADE'); ?>
		<?php echo $form->error($model,'QUANTIDADE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DATAEMISSAO'); ?>
		<?php echo $form->textField($model,'DATAEMISSAO'); ?>
		<?php echo $form->error($model,'DATAEMISSAO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ESPECIE'); ?>
		<?php echo $form->textField($model,'ESPECIE',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ESPECIE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DATAENTRADASAIDA'); ?>
		<?php echo $form->textField($model,'DATAENTRADASAIDA'); ?>
		<?php echo $form->error($model,'DATAENTRADASAIDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MARCA'); ?>
		<?php echo $form->textField($model,'MARCA',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'MARCA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NUMERO'); ?>
		<?php echo $form->textField($model,'NUMERO',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'NUMERO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDCONDPAG'); ?>
		<?php echo $form->textField($model,'IDCONDPAG'); ?>
		<?php echo $form->error($model,'IDCONDPAG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PESOBRUTO'); ?>
		<?php echo $form->textField($model,'PESOBRUTO'); ?>
		<?php echo $form->error($model,'PESOBRUTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PESO_LIQUIDO'); ?>
		<?php echo $form->textField($model,'PESO_LIQUIDO'); ?>
		<?php echo $form->error($model,'PESO_LIQUIDO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLACAVEICTRANSP'); ?>
		<?php echo $form->textField($model,'PLACAVEICTRANSP',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PLACAVEICTRANSP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDTIPOFRETE'); ?>
		<?php echo $form->textField($model,'IDTIPOFRETE'); ?>
		<?php echo $form->error($model,'IDTIPOFRETE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DSCCOMPLEMENTAR'); ?>
		<?php echo $form->textField($model,'DSCCOMPLEMENTAR',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'DSCCOMPLEMENTAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDDESTINATARIO_EMITENTE'); ?>
		<?php echo $form->textField($model,'IDDESTINATARIO_EMITENTE'); ?>
		<?php echo $form->error($model,'IDDESTINATARIO_EMITENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_TRANSPORTADORA'); ?>
		<?php echo $form->textField($model,'ID_TRANSPORTADORA'); ?>
		<?php echo $form->error($model,'ID_TRANSPORTADORA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NUM_CONTROL_FORM'); ?>
		<?php echo $form->textField($model,'NUM_CONTROL_FORM'); ?>
		<?php echo $form->error($model,'NUM_CONTROL_FORM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IMPRESSA'); ?>
		<?php echo $form->textField($model,'IMPRESSA',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'IMPRESSA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CANCELADA'); ?>
		<?php echo $form->textField($model,'CANCELADA',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'CANCELADA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MOTIVO_CANCELAMENTO'); ?>
		<?php echo $form->textField($model,'MOTIVO_CANCELAMENTO',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'MOTIVO_CANCELAMENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DATAHORA_CANC'); ?>
		<?php echo $form->textField($model,'DATAHORA_CANC'); ?>
		<?php echo $form->error($model,'DATAHORA_CANC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDEMPRESA'); ?>
		<?php echo $form->textField($model,'IDEMPRESA'); ?>
		<?php echo $form->error($model,'IDEMPRESA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'QUANTIDADE_OR'); ?>
		<?php echo $form->textField($model,'QUANTIDADE_OR'); ?>
		<?php echo $form->error($model,'QUANTIDADE_OR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CANHOTO'); ?>
		<?php echo $form->textField($model,'CANHOTO',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'CANHOTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DATA_CANHOTO'); ?>
		<?php echo $form->textField($model,'DATA_CANHOTO'); ?>
		<?php echo $form->error($model,'DATA_CANHOTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OBS_CANHOTO'); ?>
		<?php echo $form->textField($model,'OBS_CANHOTO',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'OBS_CANHOTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_USUARIO'); ?>
		<?php echo $form->textField($model,'ID_USUARIO'); ?>
		<?php echo $form->error($model,'ID_USUARIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_MOTORISTA'); ?>
		<?php echo $form->textField($model,'ID_MOTORISTA'); ?>
		<?php echo $form->error($model,'ID_MOTORISTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDNOTAFISCALORIGEM'); ?>
		<?php echo $form->textField($model,'IDNOTAFISCALORIGEM'); ?>
		<?php echo $form->error($model,'IDNOTAFISCALORIGEM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DATA_INCLUSAO'); ?>
		<?php echo $form->textField($model,'DATA_INCLUSAO'); ?>
		<?php echo $form->error($model,'DATA_INCLUSAO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_LOTE'); ?>
		<?php echo $form->textField($model,'NFE_LOTE'); ?>
		<?php echo $form->error($model,'NFE_LOTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_PROTOCOLO'); ?>
		<?php echo $form->textField($model,'NFE_PROTOCOLO',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'NFE_PROTOCOLO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_DATA_PROCESSAMENTO'); ?>
		<?php echo $form->textField($model,'NFE_DATA_PROCESSAMENTO'); ?>
		<?php echo $form->error($model,'NFE_DATA_PROCESSAMENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_CHAVE'); ?>
		<?php echo $form->textField($model,'NFE_CHAVE',array('size'=>44,'maxlength'=>44)); ?>
		<?php echo $form->error($model,'NFE_CHAVE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_ERRO'); ?>
		<?php echo $form->textField($model,'NFE_ERRO',array('size'=>60,'maxlength'=>800)); ?>
		<?php echo $form->error($model,'NFE_ERRO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_STATUS'); ?>
		<?php echo $form->textField($model,'NFE_STATUS'); ?>
		<?php echo $form->error($model,'NFE_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_MOTIVO'); ?>
		<?php echo $form->textField($model,'NFE_MOTIVO',array('size'=>60,'maxlength'=>800)); ?>
		<?php echo $form->error($model,'NFE_MOTIVO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MODELO'); ?>
		<?php echo $form->textField($model,'MODELO'); ?>
		<?php echo $form->error($model,'MODELO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NFE_CMD'); ?>
		<?php echo $form->textField($model,'NFE_CMD',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'NFE_CMD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->