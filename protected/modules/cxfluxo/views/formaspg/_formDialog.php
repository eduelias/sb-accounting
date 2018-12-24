<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'formaspg-form',
	'enableAjaxValidation' => true,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'detalha'); ?>
		<?php echo $form->checkBox($model, 'detalha'); ?>
		<?php echo $form->error($model,'detalha'); ?>
		</div><!-- row -->


   <?php echo SDialog::Botao('formaspg', 'Fluxo_idformaspg'); ?>
  
<?php
$this->endWidget();
?>
</div>