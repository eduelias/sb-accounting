<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'fluxo-arquivo-form',
	'enableAjaxValidation' => true,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idarquivo'); ?>
		<?php echo $form->dropDownList($model, 'idarquivo', GxHtml::listDataEx(Arquivo::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idarquivo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idfluxo'); ?>
		<?php echo $form->dropDownList($model, 'idfluxo', GxHtml::listDataEx(Fluxo::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idfluxo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model, 'data'); ?>
		<?php echo $form->error($model,'data'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->