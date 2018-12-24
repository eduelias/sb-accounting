<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cad-produtos-unidade-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'simbolo'); ?>
		<?php echo $form->textField($model, 'simbolo', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'simbolo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'unidade'); ?>
		<?php echo $form->textField($model, 'unidade', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'unidade'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->checkBox($model, 'ativo'); ?>
		<?php echo $form->error($model,'ativo'); ?>
		</div><!-- row -->
	<?php /*<fieldset>
		<legend>Produtos que usam esta UnidadeA</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'produtos', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutos::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	 ?><fieldset>
		<legend>Cad Ncms</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'ncms', GxHtml::encodeEx(GxHtml::listDataEx(CadNcm::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	
	<fieldset>
		<legend>Cad Produtos Gruposes</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'grupos_produtos', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosGrupos::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Produtos Validades</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'validades', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosValidade::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset><?php */?>


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->