<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idunidade'); ?>
		<?php echo $form->textField($model, 'idunidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'simbolo'); ?>
		<?php echo $form->textField($model, 'simbolo', array('maxlength' => 5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'unidade'); ?>
		<?php echo $form->textField($model, 'unidade', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ativo'); ?>
		<?php echo $form->dropDownList($model, 'ativo', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
