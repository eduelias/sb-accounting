<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idprodutos_caracter'); ?>
		<?php echo $form->textField($model,'idprodutos_caracter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idprodutos'); ?>
		<?php echo $form->textField($model,'idprodutos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dim_x'); ?>
		<?php echo $form->textField($model,'dim_x',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dim_y'); ?>
		<?php echo $form->textField($model,'dim_y',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dim_z'); ?>
		<?php echo $form->textField($model,'dim_z',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso_bruto'); ?>
		<?php echo $form->textField($model,'peso_bruto',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso_liquido'); ?>
		<?php echo $form->textField($model,'peso_liquido',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->