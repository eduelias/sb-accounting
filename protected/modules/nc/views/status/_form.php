<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'status-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'envia_email'); ?>
		<?php echo $form->checkBox($model, 'envia_email'); ?>
		<?php echo $form->error($model,'envia_email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'envia_historico'); ?>
		<?php echo $form->checkBox($model, 'envia_historico'); ?>
		<?php echo $form->error($model,'envia_historico'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->