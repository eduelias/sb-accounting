<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idmenu_pai'); ?>
		<?php echo $form->dropDownList($model, 'idmenu_pai', GxHtml::listDataEx(Menu::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idmenu_pai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->textArea($model,'visible',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'posicao'); ?>
		<?php echo $form->textField($model,'posicao'); ?>
		<?php echo $form->error($model,'posicao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagem'); ?>
		<?php echo $form->textField($model,'imagem',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'imagem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_tipo'); ?>
		<?php echo $form->dropDownList($model,'url_tipo',Menu::getEnum()); ?>
		<?php echo $form->error($model,'url_tipo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->