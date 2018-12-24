<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDNOTAFISCAL'); ?>
		<?php echo $form->textField($model,'IDNOTAFISCAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'E_S'); ?>
		<?php echo $form->textField($model,'E_S',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDTIPONF'); ?>
		<?php echo $form->textField($model,'IDTIPONF'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SERIE'); ?>
		<?php echo $form->textField($model,'SERIE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMNOTA'); ?>
		<?php echo $form->textField($model,'NUMNOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMFOLHA'); ?>
		<?php echo $form->textField($model,'NUMFOLHA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOTA_FATURA'); ?>
		<?php echo $form->textField($model,'NOTA_FATURA',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDNATOPERACAO'); ?>
		<?php echo $form->textField($model,'IDNATOPERACAO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'QUANTIDADE'); ?>
		<?php echo $form->textField($model,'QUANTIDADE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DATAEMISSAO'); ?>
		<?php echo $form->textField($model,'DATAEMISSAO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESPECIE'); ?>
		<?php echo $form->textField($model,'ESPECIE',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DATAENTRADASAIDA'); ?>
		<?php echo $form->textField($model,'DATAENTRADASAIDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MARCA'); ?>
		<?php echo $form->textField($model,'MARCA',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMERO'); ?>
		<?php echo $form->textField($model,'NUMERO',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDCONDPAG'); ?>
		<?php echo $form->textField($model,'IDCONDPAG'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PESOBRUTO'); ?>
		<?php echo $form->textField($model,'PESOBRUTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PESO_LIQUIDO'); ?>
		<?php echo $form->textField($model,'PESO_LIQUIDO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLACAVEICTRANSP'); ?>
		<?php echo $form->textField($model,'PLACAVEICTRANSP',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDTIPOFRETE'); ?>
		<?php echo $form->textField($model,'IDTIPOFRETE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DSCCOMPLEMENTAR'); ?>
		<?php echo $form->textField($model,'DSCCOMPLEMENTAR',array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDDESTINATARIO_EMITENTE'); ?>
		<?php echo $form->textField($model,'IDDESTINATARIO_EMITENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_TRANSPORTADORA'); ?>
		<?php echo $form->textField($model,'ID_TRANSPORTADORA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUM_CONTROL_FORM'); ?>
		<?php echo $form->textField($model,'NUM_CONTROL_FORM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IMPRESSA'); ?>
		<?php echo $form->textField($model,'IMPRESSA',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CANCELADA'); ?>
		<?php echo $form->textField($model,'CANCELADA',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOTIVO_CANCELAMENTO'); ?>
		<?php echo $form->textField($model,'MOTIVO_CANCELAMENTO',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DATAHORA_CANC'); ?>
		<?php echo $form->textField($model,'DATAHORA_CANC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDEMPRESA'); ?>
		<?php echo $form->textField($model,'IDEMPRESA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'QUANTIDADE_OR'); ?>
		<?php echo $form->textField($model,'QUANTIDADE_OR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CANHOTO'); ?>
		<?php echo $form->textField($model,'CANHOTO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DATA_CANHOTO'); ?>
		<?php echo $form->textField($model,'DATA_CANHOTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OBS_CANHOTO'); ?>
		<?php echo $form->textField($model,'OBS_CANHOTO',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_USUARIO'); ?>
		<?php echo $form->textField($model,'ID_USUARIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_MOTORISTA'); ?>
		<?php echo $form->textField($model,'ID_MOTORISTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDNOTAFISCALORIGEM'); ?>
		<?php echo $form->textField($model,'IDNOTAFISCALORIGEM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DATA_INCLUSAO'); ?>
		<?php echo $form->textField($model,'DATA_INCLUSAO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_LOTE'); ?>
		<?php echo $form->textField($model,'NFE_LOTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_PROTOCOLO'); ?>
		<?php echo $form->textField($model,'NFE_PROTOCOLO',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_DATA_PROCESSAMENTO'); ?>
		<?php echo $form->textField($model,'NFE_DATA_PROCESSAMENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_CHAVE'); ?>
		<?php echo $form->textField($model,'NFE_CHAVE',array('size'=>44,'maxlength'=>44)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_ERRO'); ?>
		<?php echo $form->textField($model,'NFE_ERRO',array('size'=>60,'maxlength'=>800)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_STATUS'); ?>
		<?php echo $form->textField($model,'NFE_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_MOTIVO'); ?>
		<?php echo $form->textField($model,'NFE_MOTIVO',array('size'=>60,'maxlength'=>800)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MODELO'); ?>
		<?php echo $form->textField($model,'MODELO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NFE_CMD'); ?>
		<?php echo $form->textField($model,'NFE_CMD',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->