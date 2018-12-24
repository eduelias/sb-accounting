<?php $dialog = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'diagCadStatus'));?>
<?php $this->endWidget(); ?>
<div class="form">
<style>
div.cbox label {
	display: block;
    font-size: 0.9em;
    font-weight: bold;
    margin-bottom: 0px;
}
</style>

<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cad-status-form',
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
		<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->checkBox($model, 'ativo'); ?>
		<?php echo $form->error($model,'ativo'); ?>
		</div><!-- row -->
	<fieldset>
		<legend>Tipos de Movimentações</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'fluxoFormas', GxHtml::encodeEx(GxHtml::listDataEx(FluxoForma::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->