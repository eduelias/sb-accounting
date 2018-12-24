<?php $dialog = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'diagFluxoForma'));?>
<?php $this->endWidget(); ?>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'fluxo-forma-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'entrada'); ?>
		<?php echo $form->checkBox($model, 'entrada'); ?>
		<?php echo $form->error($model,'entrada'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
	<fieldset>
		<legend>Status disponíveis para essa tipo de Movimentação</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'status', GxHtml::encodeEx(GxHtml::listDataEx(CadStatus::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	<?php /*?><fieldset>
		<legend>Fluxos</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'fluxos', GxHtml::encodeEx(GxHtml::listDataEx(Fluxo::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>*/?>


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->