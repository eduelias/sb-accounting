<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idprodutos'); ?>
		<?php echo $form->textField($model,'idprodutos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idunidade'); ?>
		<?php echo $form->textField($model,'idunidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idprodutos_categoria'); ?>
		<?php echo $form->textField($model,'idprodutos_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idusuario'); ?>
		<?php echo $form->textField($model,'idusuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idprodutos_tipo'); ?>
		<?php echo $form->textField($model,'idprodutos_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idprodutos_descricao'); ?>
		<?php echo $form->textField($model,'idprodutos_descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idprodutos_validade'); ?>
		<?php echo $form->textField($model,'idprodutos_validade'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomeprod'); ?>
		<?php echo $form->textField($model,'nomeprod',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desc_max'); ?>
		<?php echo $form->textField($model,'desc_max',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desc_min'); ?>
		<?php echo $form->textField($model,'desc_min',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qtde_min'); ?>
		<?php echo $form->textField($model,'qtde_min',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_atualizacao'); ?>
		<?php echo $form->textField($model,'data_atualizacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_cadastro'); ?>
		<?php echo $form->textField($model,'data_cadastro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ativo'); ?>
		<?php echo $form->textField($model,'ativo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->