<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cad-produtos-categoria-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idcategoria_pai'); ?>
		<?php echo $form->dropDownList($model, 'idcategoria_pai', GxHtml::listDataEx(CadProdutosCategoria::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idcategoria_pai'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fator_corr'); ?>
		<?php echo $form->textField($model, 'fator_corr', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'fator_corr'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->checkBox($model, 'ativo'); ?>
		<?php echo $form->error($model,'ativo'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->