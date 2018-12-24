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
							array(
								'template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>',
								'separator'=>''
							)
					); 
		?></div>
	</fieldset>
	<fieldset>
		<legend>Empresas que <b><u>DO GRUPO</u></b> que recebem esta conta</legend>
		<div class='cbox'>
		<?php echo $form->checkBoxList(
							$model, 
							'empresas', 
							GxHtml::encodeEx(
								GxHtml::listDataEx(
									Empresa::model()->findAllAttributes(null, true, 'dogrupo')
								), 
							false,  
							true),
							array(
								'template'=>'<li><span class="lab">{label}</span><span class="inpt">{input}</span></li>',
								'separator'=>''
							)
					); 
		?></div>
	</fieldset>
	<br><?php */ ?>

<div class="row buttons">
        <?php echo CHtml::ajaxSubmitButton('Criar',CHtml::normalizeUrl(array('conta/addnew','render'=>false)),array('success'=>'js: function(data) {
                        $("#Fluxo_idconta").append(data);
                        $("#conta_d").dialog("close");
                    }'),array('id'=>'c_conta_d')); ?>
    </div>
<?php
$this->endWidget();
?>
</div><!-- form -->
