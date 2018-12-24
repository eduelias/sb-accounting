<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idprodutos'); ?>
		<?php echo $form->textField($model, 'idprodutos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idunidade'); ?>
		<?php echo $form->dropDownList($model, 'idunidade', GxHtml::listDataEx(CadProdutosUnidade::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idcategoria'); ?>
		<?php echo $form->dropDownList($model, 'idcategoria', GxHtml::listDataEx(CadProdutosCategoria::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idusuario'); ?>
		<?php echo $form->dropDownList($model, 'idusuario', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idtipo'); ?>
		<?php echo $form->dropDownList($model, 'idtipo', GxHtml::listDataEx(CadProdutosTipo::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idvalidade'); ?>
		<?php echo $form->dropDownList($model, 'idvalidade', GxHtml::listDataEx(CadProdutosValidade::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nomeprod'); ?>
		<?php echo $form->textField($model, 'nomeprod', array('maxlength' => 200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'desc_max'); ?>
		<?php echo $form->textField($model, 'desc_max', array('maxlength' => 3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'desc_min'); ?>
		<?php echo $form->textField($model, 'desc_min', array('maxlength' => 3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'qtde_min'); ?>
		<?php echo $form->textField($model, 'qtde_min', array('maxlength' => 7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_atualizacao'); ?>
		<?php echo $form->textField($model, 'data_atualizacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_cadastro'); ?>
		<?php echo $form->textField($model, 'data_cadastro'); ?>
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
