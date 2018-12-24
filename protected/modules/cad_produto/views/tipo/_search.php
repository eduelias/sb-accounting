<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idprodutos_tipo'); ?>
		<?php echo $form->textField($model, 'idprodutos_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 100)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
