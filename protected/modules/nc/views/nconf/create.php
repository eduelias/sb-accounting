<?php
$this->breadcrumbs=array(
	'Não conformidade'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'[Nova]'),
	array('label'=>'NCs de Entrada', 'url'=>array('entrada')),
	array('label'=>'NCs de Saída', 'url'=>array('saida')),
	array('label'=>'Públicas', 'url'=>array('publicas')),
	array('label'=>'Histórico', 'url'=>array('historico')),
);
?>
<div class="form">
	<p class="note">Campos marcados com <span class="required">*</span> são obrigatórios.</p>
	<?php 
		$form = $this->beginWidget('CActiveForm', array(
		'id'=>'nconf-form',
		'enableAjaxValidation'=>false,
	)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	<?php echo $this->renderPartial('_form', array('model'=>$model,'form'=>$form)); ?>
	
	<?php echo $form->errorSummary($comentario); ?>
	<?php echo $this->renderPartial('/comentario/_form', array('model'=>$comentario,'form'=>$form)); ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar'); ?>
	</div>
	<?php $this->endWidget(); ?>
	
</div>
