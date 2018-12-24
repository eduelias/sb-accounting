<?php
	$closeform = false;
	if (!isset($form) or !method_exists($form,'labelEx')) {
		$form = $this->beginWidget('CActiveForm', array(
			'id'=>'nconf-form',
			'enableAjaxValidation'=>false,
		)); 
		$closeform = true;
?>
<div class="form">
<?php
	} 
?>

<div class="row">
	<?php echo $form->labelEx($model,'relevancia'); ?>
	<?php $this->widget('CStarRating',array('allowEmpty'=>false, 'model'=>$model,'attribute'=>'relevancia','ratingStepSize'=>'1','minRating'=>0,'maxRating'=>4)); ?>
	<br><?php echo $form->error($model,'relevancia'); ?>
</div>
 
<div class="row">
	<?php echo $form->labelEx($model,'publica'); ?>
	<?php echo CHtml::activeCheckBox($model,'publica'); ?>
	<?php echo $form->error($model,'publica'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'idsetor'); ?>
	<?php echo $form->dropDownList($model, 'idsetor', GxHtml::listDataEx(Setor::model()->findAllAttributes(null, true))); ?>
	<?php echo $form->error($model,'idsetor'); ?>
</div>

<?php if (false)  { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'iduser_cad'); ?>
		<?php echo $form->dropDownList($model, 'iduser_cad', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'iduser_cad'); ?>
	</div>
<?php } ?>

<div class="row">
	<?php echo $form->labelEx($model,'iduser_direcionado'); ?>
	<?php echo $form->dropDownList($model, 'iduser_direcionado', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
	<?php echo $form->error($model,'iduser_direcionado'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'idnconf_tipo'); ?>
	<?php $this->widget('CAutoComplete',
      array(
      	 'model'=>$model,
                     //name of the html field that will be generated
         'attribute'=>'idnconf_string', 
                     //replace controller/action with real ids
         'url'=>array('Nconf/AutoCompleteLookup'), 
         'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                     //before autocomplete initiates a lookup
         'minChars'=>4, 
         'delay'=>500, //number of milliseconds before lookup occurs
         'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                     //the input field can be defined here
         'htmlOptions'=>array('size'=>'40'), 
 
             'methodChain'=>".result(function(event,item){\$(\"#Nconf_idnconf_tipo\").val(item[1]);})",
         ));
	?>
	<?php echo CHtml::activeHiddenField($model,'idnconf_tipo'); ?>
	<?php echo $form->error($model,'idnconf_tipo'); ?>
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

