<?php $dialog = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'diagEmpresa'));?>
<?php $this->endWidget(); ?>
<div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cad-produtos-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>
		<fieldset>
		<legend>Principal</legend>
		<div class="row">
		<?php echo $form->labelEx($model,'nomeprod'); ?>
		<?php echo $form->textField($model, 'nomeprod', array('maxlength' => 200, 'size'=>'100px')); ?>
		<?php echo $form->error($model,'nomeprod'); ?>
		</div><!-- row -->
		</fieldset>
		<fieldset>
		<legend>Informações</legend>
		<div class="row">
		<?php echo $form->labelEx($model,'idunidade'); ?>
		<?php echo $form->dropDownList($model, 'idunidade', GxHtml::listDataEx(CadProdutosUnidade::model()->findAllAttributes(null, true))); ?>
		<?php echo $dialog->link(Yii::app()->createUrl('/cad_produto/unidades/create'),'CadProdutos_idunidade'); ?>
		<?php echo $form->error($model,'idunidade'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idcategoria'); ?>
		<?php echo $form->dropDownList($model, 'idcategoria', GxHtml::listDataEx(CadProdutosCategoria::model()->findAllAttributes(null, true))); ?>
		<?php echo $dialog->link(Yii::app()->createUrl('/cad_produto/categoria/create'),'CadProdutos_idcategoria'); ?>
		<?php echo $form->error($model,'idcategoria'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idtipo'); ?>
		<?php echo $form->dropDownList($model, 'idtipo', GxHtml::listDataEx(CadProdutosTipo::model()->findAllAttributes(null, true))); ?>
		<?php echo $dialog->link(Yii::app()->createUrl('/cad_produto/tipo/create'),'CadProdutos_idtipo'); ?>
		<?php echo $form->error($model,'idtipo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idvalidade'); ?>
		<?php echo $form->dropDownList($model, 'idvalidade', GxHtml::listDataEx(CadProdutosValidade::model()->findAllAttributes(null, true))); ?>
		<?php echo $dialog->link(Yii::app()->createUrl('/cad_produto/validade/create'),'CadProdutos_idvalidade'); ?>
		<?php echo $form->error($model,'idvalidade'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->checkBox($model, 'ativo'); ?>
		<?php echo $form->error($model,'ativo'); ?>
		</div><!-- row -->
		</fieldset>
		<fieldset>
		<legend>Limites</legend>
		<div class="row">
		<?php echo $form->labelEx($model,'desc_max'); ?>
		<?php echo $form->textField($model, 'desc_max', array('maxlength' => 4)); ?>
		<?php echo $form->error($model,'desc_max'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'desc_min'); ?>
		<?php echo $form->textField($model, 'desc_min', array('maxlength' => 4)); ?>
		<?php echo $form->error($model,'desc_min'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'qtde_min'); ?>
		<?php echo $form->textField($model, 'qtde_min', array('maxlength' => 7)); ?>
		<?php echo $form->error($model,'qtde_min'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx(CadProdutosPrecos::model(),'valor_tabela'); ?>
		<?php echo $form->textField(CadProdutosPrecos::model(), 'valor_tabela', array('maxlength' => 20)); ?>
		<?php
			$form->widget('application.extensions.moneymask.MMask', array('element'=>'#CadProdutosPrecos_valor_tabela',
				'config'=> array('showSymbol'=>true,
					'symbolStay'=>false,
					'symbol'=>'R$ ')));
		?>
		<?php echo $form->error(CadProdutosPrecos::model(),'valor_tabela'); ?>
		</div><!-- row -->
		</fieldset>
	<?php /* ?><fieldset>
		<legend>Características deste produto</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'caracteristicas', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosCaracter::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Descrições deste produto</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'descricoes', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosDescricao::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Produtos Fiscals</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'ficais', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosFiscal::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Produtos Gruposes</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'grupos', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosGrupos::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Produtos Icms</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'icms', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosIcms::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Produtos Imgs</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'imgs', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosImg::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Produtos Precoses</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'precos', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosPrecos::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Produtos Precos Volumes</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'preco_volume', GxHtml::encodeEx(GxHtml::listDataEx(CadProdutosPrecosVolume::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Rel Produtos Preco Clifors</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'preco_clifor', GxHtml::encodeEx(GxHtml::listDataEx(CadRelProdutosPrecoClifor::model()->findAllAttributes(null, true)), false, true)); ?>
		</div>
	</fieldset><?php */?>



<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->