<?php $dialog = $this->beginWidget('application.widgets.SComps.SDiag', array('id'=>'diagCadClifor'));?>
<?php $this->endWidget(); ?>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cad-clifor-form',
	'enableAjaxValidation' => false,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idtipo'); ?>
		<?php echo $form->dropDownList($model, 'idtipo', GxHtml::listDataEx(CadCliforTipo::model()->findAllAttributes(null, true))); ?>
		<?php echo $dialog->link(Yii::app()->createUrl('clifor/CadCliforTipo/create'),CHtml::activeId($model,'idtipo')); ?>
		<?php echo $form->error($model,'idtipo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'razao_social'); ?>
		<?php echo $form->textField($model, 'razao_social', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'razao_social'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nome_fantasia'); ?>
		<?php echo $form->textField($model, 'nome_fantasia', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'nome_fantasia'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'doc'); ?>
		<?php echo $form->textField($model, 'doc', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'doc'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ie'); ?>
		<?php echo $form->textField($model, 'ie', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'ie'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ativo'); ?>
		<?php echo $form->checkBox($model, 'ativo'); ?>
		<?php echo $form->error($model,'ativo'); ?>
		</div><!-- row -->
		<fieldset>
		<legend>Users</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'users', GxHtml::encodeEx(GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	<?php /* ?><fieldset>
		<legend>Cad Clifor Enderecos</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'cadCliforEnderecos', GxHtml::encodeEx(GxHtml::listDataEx(CadCliforEndereco::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Cad Clifor Telefones</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'cadCliforTelefones', GxHtml::encodeEx(GxHtml::listDataEx(CadCliforTelefone::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	
	<fieldset>
		<legend>Cad Rel Produtos Preco Clifors</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'cadRelProdutosPrecoClifors', GxHtml::encodeEx(GxHtml::listDataEx(CadRelProdutosPrecoClifor::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Fluxos</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'fluxos', GxHtml::encodeEx(GxHtml::listDataEx(Fluxo::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Fluxo Fretes</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'fluxoFretes', GxHtml::encodeEx(GxHtml::listDataEx(FluxoFrete::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Fluxo Nfs</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'fluxoNfs', GxHtml::encodeEx(GxHtml::listDataEx(FluxoNf::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset><? */ ?>


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->