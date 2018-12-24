<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cad-produtos-validade-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model, 'tipo', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'tipo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model, 'valor', array('maxlength' => 6)); ?>
		<?php echo $form->error($model,'valor'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'periodo'); ?>
		<?php echo $form->textField($model, 'periodo', array('maxlength' => 6)); ?>
		<?php echo $form->error($model,'periodo'); ?>
		<div class="hint">Em dias</div>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idunidade'); ?>
		<?php echo $form->dropDownList($model, 'idunidade', GxHtml::listDataEx(CadProdutosUnidade::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idunidade'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->