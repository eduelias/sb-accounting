<?php $d_empresa = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'diagEmpresa'));?>
<?php $this->endWidget(); ?>

<div class="form">
	<?php $form = $this->beginWidget('GxActiveForm', array('id'=>'fluxo-form',
		'enableAjaxValidation'=>true, 'htmlOptions' => array('enctype'=>'multipart/form-data')));
	?>
	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
		</p>

		<?php echo $form->errorSummary($model);?>
		<div class="row">
		<?php echo $form->labelEx($model, 'idempresa_origem');?>
		<?php echo $form->dropDownList($model, 'idempresa_origem', GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true, array('condition'=>(isset($origem)?$origem:''),'order'=>'nome asc') )),array('prompt'=>'**** CEDENTE ****'));?>
		<?php echo $d_empresa->link(Yii::app()->createUrl('/cxfluxo/empresa/create'),'Fluxo_idempresa_origem'); ?>
		<?php echo $form->error($model, 'idempresa_origem');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'idempresa_destino');?>
		<?php echo $form->dropDownList($model, 'idempresa_destino', GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true,  array('condition'=>(isset($destino)?$destino:''),'order'=>'nome asc'))),array('prompt'=>'**** SACADO ****'));?>
		<?php echo $d_empresa->link(Yii::app()->createUrl('/cxfluxo/empresa/create'),'Fluxo_idempresa_destino'); ?>
		<?php echo $form->error($model, 'idempresa_destino');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'idconta');?>
		<?php echo $form->dropDownList($model, 'idconta', GxHtml::listDataEx(Conta::model()->findAllAttributes(null, true, array('order'=>'descricao asc'))),array('prompt'=>'**** CONTA ****'));?>
		<?php echo $d_empresa->link(Yii::app()->createUrl('/cxfluxo/conta/create'),'Fluxo_idconta'); ?>
		<?php echo $form->error($model, 'idconta');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'idccusto');?>
		<?php echo $form->dropDownList($model, 'idccusto', GxHtml::listDataEx(Ccusto::model()->findAllAttributes(null, true, array('order'=>'descricao asc'))),array('prompt'=>'**** CENTRO DE CUSTO ****'));?>
		<?php echo $d_empresa->link(Yii::app()->createUrl('/cxfluxo/ccusto/create'),'Fluxo_idccusto'); ?>
		<?php echo $form->error($model, 'idccusto');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'doc_numero');?>
		<?php echo $form->textField($model, 'doc_numero', array('size'=>'100','maxlength'=>100));?>
		<?php echo $form->error($model, 'doc_numero');?>
		</div><!-- row -->
		<fieldset>
		<legend>Dados da Nota Fiscal</legend>
		<div class="row">
		<?php echo $form->labelEx($model, 'data_faturamento');?>
		<?php
				$this->widget('CMaskedTextField', array( 
					'model' => $model,
					'attribute' => 'data_faturamento',
					'mask' => '99/99/9999',
					'htmlOptions' => array('size' => 10)
				));
		?>
		<?php echo $form->error($model, 'data_faturamento');?>
		
		</div>
		<div class="row">
		<?php echo $form->labelEx($model, 'nf');?>
		<?php echo $form->textField($model, 'nf', array('size'=>'10','maxlength'=>6));?>
		<?php echo $form->error($model, 'nf');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'valor_fatura');?>
		<?php $form->widget('application.extensions.price.PriceMask', array('element'=>'#Fluxo_valor_fatura')); ?>
		<?php echo $form->textField($model, 'valor_fatura', array('maxlength'=>18));?>
		<?php echo $form->error($model, 'valor_fatura');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'data_vencimento');?>
		<?php
				$this->widget('CMaskedTextField', array( 
					'model' => $model,
					'attribute' => 'data_vencimento',
					'mask' => '99/99/9999',
					'htmlOptions' => array('size' => 10)
				));
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
		<?php echo $form->labelEx($model, 'idformaspg');?>
		<?php echo $form->dropDownList($model,'idformaspg',CHtml::listData(Formaspg::model()->findAll(),'idformaspg','nome'),array('prompt'=>'**** ESCOLHA ****')); ?>
		<?php echo $d_empresa->link(Yii::app()->createUrl('/cxfluxo/formaspg/create'),'Fluxo_idformaspg'); ?>
		<?php echo $form->error($model, 'idformaspg');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'data_pagamento');?>
		<?php
				$this->widget('CMaskedTextField', array( 
					'model' => $model,
					'attribute' => 'data_pagamento',
					'mask' => '99/99/9999',
					'htmlOptions' => array('size' => 10)
				));
		?>
		<?php echo $form->error($model, 'data_pagamento');?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model, 'valor_pagamento');?>
		<?php $form->widget('application.extensions.price.PriceMask', array('element'=>'#Fluxo_valor_pagamento')); ?>
		<?php echo $form->textField($model, 'valor_pagamento', array('maxlength'=>18));?>
		<?php echo $form->error($model, 'valor_pagamento');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'valor_multa');?>
		<?php $form->widget('application.extensions.price.PriceMask', array('element'=>'#Fluxo_valor_multa')); ?>
		<?php echo $form->textField($model, 'valor_multa', array('maxlength'=>16));?>
		<?php echo $form->error($model, 'valor_multa');?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model, 'valor_juros');?>
		<?php $form->widget('application.extensions.price.PriceMask', array('element'=>'#Fluxo_valor_juros')); ?>
		<?php echo $form->textField($model, 'valor_juros', array('maxlength'=>16));?>
		<?php echo $form->error($model, 'valor_juros');?>
		</div>
		</fieldset>
		<div class="row">
		<?php echo $form->labelEx($model, 'observacao');?>
		<?php echo $form->textField($model, 'observacao', array('size'=>100,'maxlength'=>255));?>
		<?php echo $form->error($model, 'observacao');?>
		</div><!-- row -->
		<?php echo GxHtml::submitButton("Salvar"); $this->endWidget(); ?>
</div><!-- form -->