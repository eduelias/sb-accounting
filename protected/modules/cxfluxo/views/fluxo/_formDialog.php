<?php
	//$bu = Yii::app()->baseUrl;
	//$cs = yii::app()->getClientScript();
	//$cs->registerScriptFile($baseUrl.'')
?>
<script src="http://192.168.2.210/solbrilhante/assets/c2384e2/jquery.yiiactiveform.js"></script>
<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array('id'=>'baixa-form',
		'enableAjaxValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true) ));
?>
	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model);?>
	<div class="row">
		<?php echo $form->labelEx($model, 'idempresa_origem');?>
		<?php echo $model->idempresaOrigem !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idempresaOrigem)), array('empresa/view', 'id' => GxActiveRecord::extractPkValue($model->idempresaOrigem, true))) : null; ?>
	</div><!-- row -->
	<div class="row">
		<?php echo $form->labelEx($model, 'idempresa_destino');?>
		<?php echo $model->idempresaDestino !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idempresaDestino)), array('empresa/view', 'id' => GxActiveRecord::extractPkValue($model->idempresaDestino, true))) : null;?>
	</div><!-- row -->
	<div class="row">
		<?php echo $form->labelEx($model, 'idconta');?>
		<?php echo $model->idconta0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idconta0)), array('conta/view', 'id' => GxActiveRecord::extractPkValue($model->idconta0, true))) : null;?>
	</div><!-- row -->
	<div class="row">
		<?php echo $form->labelEx($model, 'doc_numero');?>
		<?php echo $model->doc_numero;?>
	</div><!-- row -->
	<fieldset>
		<legend>
			Datas
		</legend>
		<div class="row">
			<?php echo $form->labelEx($model, 'data_faturamento');?>
			<?php echo $model->data_faturamento;?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model, 'data_vencimento');?>
			<?php $model->data_vencimento;?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model, 'data_pagamento');?>
			<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model,
					'language'=>'pt',
					'attribute'=>'data_pagamento',
					'value'=>$model->data_pagamento,
					'options'=> array('showButtonPanel'=>true,
						'changeYear'=>true,
						'dateFormat'=>'dd/mm/yy', ), )); ;
			?>
			<?php echo $form->error($model, 'data_pagamento');?>
		</div>
	</fieldset><!-- row -->
	<div class="row">
		<?php echo $form->labelEx($model, 'idformaspg');?> 
		<?php echo $form->dropDownList($model, 'idformaspg', CHtml::listData(Formaspg::model()->findAll(), 'idformaspg', 'nome'), array('prompt'=>'*** SELECIONE A FORMA DE PAGAMENTO ***'));?>
		<?php echo $form->error($model, 'idformaspg');?>
	</div><!-- row -->
	<fieldset>
		<legend>
			Valores
		</legend>
		<div class="row">
			<?php echo $form->labelEx($model, 'valor_fatura');?>
			<?php echo $model->valor_fatura;?>
		</div><!-- row -->
		<div class="row">
			<?php echo $form->labelEx($model, 'valor_pagamento');?>
			<?php
				$form->widget('application.extensions.moneymask.MMask', array('element'=>'#Fluxo_valor_pagamento',
					'config'=> array('showSymbol'=>true,
						'symbolStay'=>false,
						'symbol'=>'R$ ')));
			?>
			<?php echo $form->textField($model, 'valor_pagamento', array('maxlength'=>12));?>
			<?php echo $form->error($model, 'valor_pagamento');?>
		</div><!-- row -->
		<div class="row">
			<?php echo $form->labelEx($model, 'valor_multa');?>
			<?php
				$form->widget('application.extensions.moneymask.MMask', array('element'=>'#Fluxo_valor_multa',
					'config'=> array('showSymbol'=>true,
						'symbolStay'=>false,
						'symbol'=>'R$ ')));
			?>
			<?php echo $form->textField($model, 'valor_multa', array('maxlength'=>10));?>
			<?php echo $form->error($model, 'valor_multa');?>
		</div><!-- row -->
		<div class="row">
			<?php echo $form->labelEx($model, 'valor_juros');?>
			<?php
				$form->widget('application.extensions.moneymask.MMask', array('element'=>'#Fluxo_valor_juros',
					'config'=> array('showSymbol'=>true,
						'symbolStay'=>false,
						'symbol'=>'R$ ')));
			?>
			<?php echo $form->textField($model, 'valor_juros', array('maxlength'=>10));?>
			<?php echo $form->error($model, 'valor_juros');?>
		</div>
	</fieldset>
	<div class="row">
		<?php echo $form->labelEx($model, 'observacao');?>
		<?php echo $form->textField($model, 'observacao', array('size'=>100,
				'maxlength'=>255));
		?>
		<?php echo $form->error($model, 'observacao');?>
	</div><!-- row -->
</div>
<div class="row buttons">
	<?php
		echo CHtml::ajaxSubmitButton('Baixa', CHtml::normalizeUrl( array('/cxfluxo/fluxo/baixa',
			'request'=>false,
			'id'=>$model->idfluxo)), array('success'=>'js:function(data) { $("#fluxo-grid").yiiGridView.update("fluxo-grid"); $("#baixa-fluxo").dialog("close");}'), array('id'=>'c_conta_d'));
	?>
</div>
<?php

	$this->endWidget();
?>
</div><!-- form -->