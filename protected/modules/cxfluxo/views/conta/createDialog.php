<h2><?php echo $this->titulo; ?></h2>
<?php
$this->beginWidget('application.widgets.SComps.SDiag',array(
	'id'=>'conta_d')
);
?>
<?php echo $this->renderPartial('_formDialog', array('model'=>$model)); ?>
<?php $this->endWidget('application.widgets.SComps.SDiag');?>