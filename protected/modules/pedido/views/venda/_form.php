<?php $dialog = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'diagFluxo'));?>
<?php $this->endWidget(); ?>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'fluxo-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idfluxo_forma'); ?>
		<?php echo $form->dropDownList($model, 'idfluxo_forma', GxHtml::listDataEx(FluxoForma::model()->findAllAttributes(null, true))); ?>
<?php $dialog->link(Yii::app()->createUrl('/create'),CHtml::activeId($model,'idfluxo_forma')); ?>
		<?php echo $form->error($model,'idfluxo_forma'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idclifor'); ?>
		<?php echo $form->dropDownList($model, 'idclifor', GxHtml::listDataEx(CadClifor::model()->findAllAttributes(null, true))); ?>
<?php $dialog->link(Yii::app()->createUrl('/create'),CHtml::activeId($model,'idclifor')); ?>
		<?php echo $form->error($model,'idclifor'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idusuario'); ?>
		<?php echo $form->dropDownList($model, 'idusuario', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
<?php $dialog->link(Yii::app()->createUrl('/create'),CHtml::activeId($model,'idusuario')); ?>
		<?php echo $form->error($model,'idusuario'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->checkBox($model, 'ativo'); ?>
		<?php echo $form->error($model,'ativo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'previsao'); ?>
		<?php echo $form->checkBox($model, 'previsao'); ?>
		<?php echo $form->error($model,'previsao'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'data_cadastro'); ?>
		<?php echo $form->textField($model, 'data_cadastro'); ?>
		<?php echo $form->error($model,'data_cadastro'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->