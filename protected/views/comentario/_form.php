<?php
	$closeform = false;
	if (!isset($form) or !method_exists($form,'labelEx')) {
		$form = $this->beginWidget('CActiveForm', array(
			'id'=>'comentario-form',
			'enableAjaxValidation'=>false,
		)); 
		$closeform = true;
?>
<div class="form">
<?php
	} 
?>
	
<div class="row">
	<?php echo $form->labelEx($model,'comentario'); ?>
	<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
	<?php echo $form->error($model,'comentario'); ?>
</div>

<?php 
		if ($closeform) {
			 $this->endWidget();
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar'); ?>
	</div>
</div>
<?php
		}; 
?>
