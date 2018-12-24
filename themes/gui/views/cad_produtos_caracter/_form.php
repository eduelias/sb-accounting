<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cad-produtos-caracter-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idprodutos'); ?>
		<?php echo $form->textField($model,'idprodutos'); ?>
		<?php echo $form->error($model,'idprodutos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dim_x'); ?>
		<?php echo $form->textField($model,'dim_x',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'dim_x'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dim_y'); ?>
		<?php echo $form->textField($model,'dim_y',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'dim_y'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dim_z'); ?>
		<?php echo $form->textField($model,'dim_z',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'dim_z'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peso_bruto'); ?>
		<?php echo $form->textField($model,'peso_bruto',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'peso_bruto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peso_liquido'); ?>
		<?php echo $form->textField($model,'peso_liquido',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'peso_liquido'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->