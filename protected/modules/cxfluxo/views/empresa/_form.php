<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'empresa-form',
	'enableAjaxValidation' => true,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'documento'); ?>
		 <?php
                $this->widget('CMaskedTextField',array(
                    'model'=>$model,
                    'attribute'=>'documento',
                    'id'=>'documento',
                    'mask'=>'99.999.999/9999-99', 
					'placeholder'=>' '   
                ));
            ?>
		<?php echo $form->error($model,'documento'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'dogrupo'); ?>&nbsp;
		<?php echo $form->checkBox($model, 'dogrupo'); ?>
		<?php echo $form->error($model,'dogrupo'); ?>
		</div><!-- row -->
	<?php /*?><fieldset>
		<legend>Usuários desta empresa:</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'users', GxHtml::encodeEx(GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Contas associadas a esta empresa:</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList($model, 'contas', GxHtml::encodeEx(GxHtml::listDataEx(Conta::model()->findAllAttributes(null, true)), false, true),array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')); ?>
		</div>
	</fieldset><?php */ ?>

<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->