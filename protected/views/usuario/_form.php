<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cad-usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php if ($model->isNewRecord) { ?>
		
		<div class="row">
			<?php echo $form->labelEx($model,'idclifor'); ?>
			<?php echo $form->textField($model,'idclifor'); ?>
			<?php echo $form->error($model,'idclifor'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'login'); ?>
			<?php echo $form->textField($model,'login',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'login'); ?>
		</div>
		
	<?php } else { ?>
		
		<div class="row">
			<?php echo $form->labelEx($model,'login'); ?>
			<b><?php echo $model->login; ?></b>: <?php echo $model->clifor->nome; ?>
			<?php echo $form->error($model,'login'); ?>
		</div>
		
	<?php } ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->textField($model,'ativo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ativo'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->