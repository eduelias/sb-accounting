<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idfluxo'); ?>
		<?php echo $form->textField($model, 'idfluxo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'iduser'); ?>
		<?php echo $form->dropDownList($model, 'iduser', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idempresa_origem'); ?>
		<?php echo $form->dropDownList($model, 'idempresa_origem', GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idempresa_destino'); ?>
		<?php echo $form->dropDownList($model, 'idempresa_destino', GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idconta'); ?>
		<?php echo $form->dropDownList($model, 'idconta', GxHtml::listDataEx(Conta::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idccusto'); ?>
		<?php echo $form->dropDownList($model, 'idccusto', GxHtml::listDataEx(Ccusto::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'iduser_pgto'); ?>
		<?php echo $form->dropDownList($model, 'iduser_pgto', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idformaspg'); ?>
		<?php echo $form->dropDownList($model, 'idformaspg', GxHtml::listDataEx(Formaspg::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_sistema'); ?>
		<?php echo $form->textField($model, 'data_sistema'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_faturamento'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'data_faturamento',
			'value' => $model->data_faturamento,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_vencimento'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'data_vencimento',
			'value' => $model->data_vencimento,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_pagamento'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'data_pagamento',
			'value' => $model->data_pagamento,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_cancelado'); ?>
		<?php echo $form->textField($model, 'data_cancelado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'doc_numero'); ?>
		<?php echo $form->textField($model, 'doc_numero', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor_fatura'); ?>
		<?php echo $form->textField($model, 'valor_fatura', array('maxlength' => 12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor_pagamento'); ?>
		<?php echo $form->textField($model, 'valor_pagamento', array('maxlength' => 12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor_multa'); ?>
		<?php echo $form->textField($model, 'valor_multa', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor_juros'); ?>
		<?php echo $form->textField($model, 'valor_juros', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'observacao'); ?>
		<?php echo $form->textField($model, 'observacao', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_sisfat'); ?>
		<?php echo $form->textField($model, 'id_sisfat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tipo_sisfat'); ?>
		<?php echo $form->textField($model, 'tipo_sisfat', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'filename'); ?>
		<?php echo $form->textField($model, 'filename', array('maxlength' => 255)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
