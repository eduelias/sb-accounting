<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idprodutos_validade'); ?>
		<?php echo $form->textField($model, 'idprodutos_validade'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idunidade'); ?>
		<?php echo $form->dropDownList($model, 'idunidade', GxHtml::listDataEx(CadProdutosUnidade::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tipo'); ?>
		<?php echo $form->textField($model, 'tipo', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor'); ?>
		<?php echo $form->textField($model, 'valor', array('maxlength' => 6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'periodo'); ?>
		<?php echo $form->textField($model, 'periodo', array('maxlength' => 6)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
