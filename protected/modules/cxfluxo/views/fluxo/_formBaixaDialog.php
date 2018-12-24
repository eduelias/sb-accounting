<?php $dbaixa = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'dbaixa'));?>
<?php $this->endWidget(); ?>
<script src="http://192.168.2.210/solbrilhante/assets/c2384e2/jquery.yiiactiveform.js"></script>

<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
		'id'=>'baixa-form',
		'enableAjaxValidation'=>true, ));
	?>		
		<?php echo $form->errorSummary($model);?>
		<fieldset>
		<legend>Dados do Pagamento</legend>
		<div class="row">
		<?php //echo CHtml::hiddenField('ajax','baixa-form'); ?>
		<?php echo $form->labelEx($model, 'idempresa_origem');?>
		<?php echo $model->idempresaOrigem->nome;?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'idempresa_destino');?>
		<?php echo $model->idempresaDestino->nome;?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'idconta');?>
		<?php echo $model->idconta0->descricao;?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'doc_numero');?>
		<?php echo $model->doc_numero;?>
		</div><!-- row -->
		</fieldset>
		<fieldset>
		<legend>Dados da Nota Fiscal</legend>
		<div class="row">
		<?php echo $form->labelEx($model, 'data_faturamento');?>
		<?php echo CHtml::encode($model->data_faturamento);	?>
		<?php echo $form->error($model, 'data_faturamento');?>
		
		</div>
		<div class="row">
		<?php echo $form->labelEx($model, 'nf');?>
		<?php echo $form->textField($model, 'nf', array('size'=>'10','maxlength'=>6));?>
		<?php echo $form->error($model, 'nf');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'valor_fatura');?>
		<?php
			$form->widget('application.extensions.moneymask.MMask', array('element'=>'#Fluxo_valor_fatura',
				'config'=> array('showSymbol'=>true,
					'symbolStay'=>false,
					'symbol'=>'R$ ')));
		?>
		<?php echo $form->textField($model, 'valor_fatura', array('maxlength'=>12));?>
		<?php echo $form->error($model, 'valor_fatura');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'data_vencimento');?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model,
				'language'=>'pt',
				'attribute'=>'data_vencimento',
				'value'=>$model->data_vencimento,
				'options'=> array('showButtonPanel'=>true,
					'changeYear'=>true,
					'dateFormat'=>'dd/mm/yy', ), ));
			;
		?>
		<?php echo $form->error($model, 'data_vencimento');?>
		</div>
		</fieldset><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'file');?>
		<?php echo CHtml::activeFileField($model, 'file'); ?>
		<?php echo $form->error($model, 'file');?>
		</div>
		<fieldset>
		<legend>Dados do Pagamento</legend>
		<div class="row">
		<?php echo $form->labelEx($model, 'data_pagamento');?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model,
				'language'=>'pt',
				'attribute'=>'data_pagamento',
				'value'=>$model->data_pagamento,
				'options'=> array('showButtonPanel'=>true,
					'changeYear'=>true,
					'dateFormat'=>'dd/mm/yy', ), ));
			;
		?>
		<?php echo $form->error($model, 'data_pagamento');?>
		</div>
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
		<div class="row">
		<?php echo $form->labelEx($model, 'idformaspg');?>
		<?php echo $form->dropDownList($model,'idformaspg',CHtml::listData(Formaspg::model()->findAll(),'idformaspg','nome'),array('prompt'=>'**** ESCOLHA ****')); ?>
		<?php echo $dbaixa->link(Yii::app()->createUrl('/cxfluxo/formaspg/create'),'Fluxo_idformaspg'); ?>
		<?php echo $form->error($model, 'idformaspg');?>
		</div><!-- row -->
		</fieldset>
		<div class="row">
		<?php echo $form->labelEx($model, 'observacao');?>
		<?php echo $form->textField($model, 'observacao', array('size'=>100,'maxlength'=>255));?>
		<?php echo $form->error($model, 'observacao');?>
		</div><!-- row -->
				
		<?php 
		
		
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->