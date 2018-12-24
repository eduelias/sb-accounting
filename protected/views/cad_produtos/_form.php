<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cad-produtos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idunidade'); ?>
		<?php echo $form->textField($model,'idunidade'); ?>
		<?php echo $form->error($model,'idunidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idprodutos_categoria'); ?>
		<?php echo $form->textField($model,'idprodutos_categoria'); ?>
		<?php echo $form->error($model,'idprodutos_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idusuario'); ?>
		<?php echo $form->textField($model,'idusuario'); ?>
		<?php echo $form->error($model,'idusuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idprodutos_tipo'); ?>
		<?php echo $form->textField($model,'idprodutos_tipo'); ?>
		<?php echo $form->error($model,'idprodutos_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idprodutos_descricao'); ?>
		<?php echo $form->textField($model,'idprodutos_descricao'); ?>
		<?php echo $form->error($model,'idprodutos_descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idprodutos_validade'); ?>
		<?php echo $form->textField($model,'idprodutos_validade'); ?>
		<?php echo $form->error($model,'idprodutos_validade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomeprod'); ?>
		<?php echo $form->textField($model,'nomeprod',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nomeprod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_max'); ?>
		<?php echo $form->textField($model,'desc_max',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'desc_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_min'); ?>
		<?php echo $form->textField($model,'desc_min',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'desc_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde_min'); ?>
		<?php echo $form->textField($model,'qtde_min',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'qtde_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_atualizacao'); ?>
		<?php echo $form->textField($model,'data_atualizacao'); ?>
		<?php echo $form->error($model,'data_atualizacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_cadastro'); ?>
		<?php echo $form->textField($model,'data_cadastro'); ?>
		<?php echo $form->error($model,'data_cadastro'); ?>
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