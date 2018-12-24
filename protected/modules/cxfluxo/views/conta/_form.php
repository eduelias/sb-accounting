<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'conta-form',
	'enableAjaxValidation' => true,
));
?>	<p class="note">
		<span class="required">*</span> Campo Obrigat&oacute;rio.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model, 'descricao', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
	<?php /* ?><fieldset>
		<legend>Empresas que <b><u>recebem</u></b> esta conta</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList(
							$model, 
							'empresas', 
							GxHtml::encodeEx(
								GxHtml::listDataEx(
									Empresa::model()->findAllAttributes(null, true, 'not dogrupo')
								), 
							false,  
							true),
							array('template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>')
					); 
		?></div>
	</fieldset>
	<br><?php */ ?>

<?php
echo GxHtml::submitButton("Salvar");
$this->endWidget();
?>
</div><!-- form -->