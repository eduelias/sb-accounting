<?php $dsetor = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'dSetor'));?>
<?php $this->endWidget(); ?>
<div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'setor-form',
	'enableAjaxValidation' => true,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'iduser_responsavel'); ?>
		<?php echo $form->dropDownList($model, 'iduser_responsavel', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $dsetor->link(Yii::app()->createUrl('/user/default/create'),'Setor_iduser_responsavel'); ?>
		<?php echo $form->error($model,'iduser_responsavel'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
	<fieldset>
		<legend>Usuários deste setor</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'users', GxHtml::encodeEx(GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>','separator'=>'')); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Tipos de N&atilde;o Conformidades Associadas</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'tipoNaoConformidades', GxHtml::encodeEx(GxHtml::listDataEx(TipoNaoConformidade::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>','separator'=>'')); ?>
		</div>
	</fieldset>


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->