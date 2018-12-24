<?php $dbaixa = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'dbaixa'));?>
<?php $this->endWidget(); ?>
<script src="http://192.168.2.210/solbrilhante/assets/c2384e2/jquery.yiiactiveform.js"></script>
<style>
div.form .row{
	margin: 0px;
	padding: 0px;
}
</style>
<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
		'id'=>'baixa-form',
		'enableAjaxValidation'=>true, ));
	?>		
		<?php echo $form->errorSummary($model);?>
		<fieldset>
		<legend>Dados da Nota Fiscal</legend>
		<div class="row" style="width:52% !important">
		<?php echo $form->labelEx($model, 'idempresa_origem');?>
		<?php echo $model->idempresaOrigem->nome;?>
		</div>
		<div class="row" style="width:40% !important">
		<?php echo $form->labelEx($model, 'idempresa_destino');?>
		<?php echo $model->idempresaDestino->nome;?>
		</div>
		</fieldset>
		<div class="row">
		<?php echo $form->labelEx($model, 'doc_numero');?>
		<?php echo $model->doc_numero;?>
		</div><!-- row -->
		
		<fieldset>
		<legend>Dados da Nota Fiscal</legend>
		<div class="row">
		<?php echo $form->label($model, 'nf');?>
		<?php echo $form->textField($model, 'nf', array('size'=>'10','maxlength'=>6));?>
		<?php echo $form->error($model, 'nf');?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model, 'valor_boleto');?>
		<?php
			$form->widget('application.extensions.moneymask.MMask', array('element'=>'#Fluxo_valor_boleto',
				'config'=> array('showSymbol'=>true,
					'symbolStay'=>false,
					'symbol'=>'R$ ')));
		?>
		<?php echo $form->textField($model, 'valor_boleto', array('maxlength'=>12));?>
		<?php echo $form->error($model, 'valor_boleto');?>
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
		<?php /* ?><div class="row">
		<?php echo $form->labelEx($model, 'file');?>
		<?php echo CHtml::activeFileField($model, 'file'); ?>
		<?php echo $form->error($model, 'file');?>
		</div>
		*/?>
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
		</fieldset>
		<div class="row">
		<?php echo $form->labelEx($model, 'idformaspg');?>
		<?php echo $form->dropDownList($model,'idformaspg',CHtml::listData(Formaspg::model()->findAll(),'idformaspg','nome'),array('prompt'=>'**** ESCOLHA ****')); ?>
		<?php echo $dbaixa->link(Yii::app()->createUrl('/cxfluxo/formaspg/create'),'Fluxo_idformaspg'); ?>
		<?php echo $form->error($model, 'idformaspg');?>
		</div><!-- row -->
		
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