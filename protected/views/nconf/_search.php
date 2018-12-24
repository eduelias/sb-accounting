<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idnconf'); ?>
		<?php echo $form->textField($model,'idnconf'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idsetor'); ?>
		<?php echo $form->textField($model,'idsetor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iduser_cad'); ?>
		<?php echo $form->textField($model,'iduser_cad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iduser_direcionado'); ?>
		<?php echo $form->textField($model,'iduser_direcionado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idnconf_tipo'); ?>
		<?php echo $form->textField($model,'idnconf_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publica'); ?>
		<?php echo $form->textField($model,'publica',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relevancia'); ?>
		<?php echo $form->textField($model,'relevancia',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enviou_email'); ?>
		<?php echo $form->textField($model,'enviou_email',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->