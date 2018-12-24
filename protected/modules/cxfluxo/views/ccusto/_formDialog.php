<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'ccusto-form',
	'enableAjaxValidation' => true,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
<?php
echo SDialog::Botao('ccusto', 'Fluxo_idccusto');
$this->endWidget();
?>
</div><!-- form -->