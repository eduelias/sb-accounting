<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => true,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('size'=>'100','maxlength' => 255)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->
		<?php if (!isset($self)) : ?>
		<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model, 'login', array('size'=>'55','maxlength' => 45)); ?>
		<?php echo $form->error($model,'login'); ?>
		</div><!-- row -->
		<?php endif; ?>
		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'password2'); ?>
			<?php echo $form->passwordField($model,'password2',array('size'=>20,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<?php if (!isset($self)) : ?>
		<div class="row">
		<?php echo $form->labelEx($model,'seed'); ?>
		<?php echo $form->textField($model, 'seed', array('size'=>'100','maxlength' => 255)); ?>
		<?php echo $form->error($model,'seed'); ?>
		</div><!-- row -->
		<?php endif; ?>
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('size'=>'100','maxlength' => 255)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<?php if (!isset($self)) : ?>
	<fieldset>
		<legend>Pertence aos Setores:</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'setor', GxHtml::encodeEx(GxHtml::listDataEx(Setor::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>','separator'=>'')); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>É <b>responsável</b> pelos setores:</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'responsavel', GxHtml::encodeEx(GxHtml::listDataEx(Setor::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>','separator'=>'')); ?>
		</div>
	</fieldset>
	<?php endif; ?>


<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->