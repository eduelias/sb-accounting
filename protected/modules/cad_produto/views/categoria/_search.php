<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idprodutos_categoria'); ?>
		<?php echo $form->textField($model, 'idprodutos_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idcategoria_pai'); ?>
		<?php echo $form->dropDownList($model, 'idcategoria_pai', GxHtml::listDataEx(CadProdutosCategoria::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fator_corr'); ?>
		<?php echo $form->textField($model, 'fator_corr', array('maxlength' => 5)); ?>
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
