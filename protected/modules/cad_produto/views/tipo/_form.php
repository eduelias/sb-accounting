<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cad-produtos-tipo-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->