<?php $this->widget('application.widgets.MInput.MInput'); ?>
<?php $this->widget('application.widgets.MTab.MTab'); ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cad-produtos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="w_tabs">
		<ul class="w_tab">
			<li>Produto</li>
			<li>Tarifas</li>
		</ul>

		<div class="w_contents">

		<div class="w_tabSection">
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nomeprod'); ?>
		<?php echo $form->textField($model,'nomeprod',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nomeprod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idunidade'); ?>
		<?php echo $form->textField($model,'idunidade'); ?>
		<?php echo $form->error($model,'idunidade'); ?>
	</div>

	<div class="w_magicInput">
		<ul>
			<li class="input">
				<?php echo $form->labelEx($model,'idprodutos_categoria'); ?>
				<?php echo $form->textField($model,'idprodutos_categoria'); ?>
				<?php echo $form->error($model,'idprodutos_categoria'); ?>
			</li>
			<li class="results"></li>
			<li class="choosen"></li>
		</ul>
	</div>

	<div class="w_magicInput">
		<ul>
			<li class="input">
				<?php echo $form->labelEx($model,'idprodutos_tipo'); ?>
				<?php echo $form->textField($model,'idprodutos_tipo'); ?>
				<?php echo $form->error($model,'idprodutos_tipo'); ?>
			</li>
			<li class="results"></li>
			<li class="choosen"></li>
		</ul>
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
		<?php echo $form->labelEx($model,'desc_max'); ?>
		<?php echo $form->textField($model,'desc_max',array('size'=>3,'maxlength'=>3,'value'=>!empty($model->desc_max) ? $model->desc_max : 0)); ?>
		<?php echo $form->error($model,'desc_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_min'); ?>
		<?php echo $form->textField($model,'desc_min',array('size'=>3,'maxlength'=>3,'value'=>!empty($model->desc_min) ? $model->desc_min : 0)); ?>
		<?php echo $form->error($model,'desc_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde_min'); ?>
		<?php echo $form->textField($model,'qtde_min',array('size'=>7,'maxlength'=>7,'value'=>!empty($model->qtde_min) ? $model->qtde_min : 0)); ?>
		<?php echo $form->error($model,'qtde_min'); ?>
	</div>


<?php echo $form->errorSummary($produtoCaracteristicas); ?>

	<div class="row">
		<?php echo $form->labelEx($produtoCaracteristicas,'dim_x'); ?>
		<?php echo $form->textField($produtoCaracteristicas,'dim_x',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($produtoCaracteristicas,'dim_x'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($produtoCaracteristicas,'dim_y'); ?>
		<?php echo $form->textField($produtoCaracteristicas,'dim_y',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($produtoCaracteristicas,'dim_y'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($produtoCaracteristicas,'dim_z'); ?>
		<?php echo $form->textField($produtoCaracteristicas,'dim_z',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($produtoCaracteristicas,'dim_z'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($produtoCaracteristicas,'peso_bruto'); ?>
		<?php echo $form->textField($produtoCaracteristicas,'peso_bruto',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($produtoCaracteristicas,'peso_bruto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($produtoCaracteristicas,'peso_liquido'); ?>
		<?php echo $form->textField($produtoCaracteristicas,'peso_liquido',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($produtoCaracteristicas,'peso_liquido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->dropDownList($model,'ativo',array('S'=>'Sim','N'=>'Não')); ?>
		<?php echo $form->error($model,'ativo'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar Produto' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>
		</div>
	</div>
</div><!-- form -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.numeric.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.decimal.js"></script>
<script type="text/javascript">
$(function(){
	$('#cad_produtos_idprodutos_categoria').mInput({
		url:'<?php echo CHtml::normalizeUrl(array('cad_produtos_categoria/jsonCategoria'));?>'
	});

	$('#cad_produtos_idprodutos_tipo').mInput({
		url:'<?php echo CHtml::normalizeUrl(array('cad_produtos_tipo/jsonTipo'));?>'
	});

	$('#cad_produtos_desc_max,#cad_produtos_desc_min').decimal();
	$('#cad_produtos_qtde_min').numeric();
});
</script>