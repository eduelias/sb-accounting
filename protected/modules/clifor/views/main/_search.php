<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idclifor'); ?>
		<?php echo $form->textField($model, 'idclifor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idtipo'); ?>
		<?php echo $form->dropDownList($model, 'idtipo', GxHtml::listDataEx(CadCliforTipo::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'razao_social'); ?>
		<?php echo $form->textField($model, 'razao_social', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nome_fantasia'); ?>
		<?php echo $form->textField($model, 'nome_fantasia', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'doc'); ?>
		<?php echo $form->textField($model, 'doc', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ie'); ?>
		<?php echo $form->textField($model, 'ie', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_cadastro'); ?>
		<?php echo $form->textField($model, 'data_cadastro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_atualizacao'); ?>
		<?php echo $form->textField($model, 'data_atualizacao'); ?>
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
