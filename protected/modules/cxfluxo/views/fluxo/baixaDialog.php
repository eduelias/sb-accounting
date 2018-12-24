<?php
$this->beginWidget('application.widgets.SComps.SDiag',array(
	'id'=>'fluxo_d')
);
?>
<h2><?php echo $this->titulo; ?></h2>
<?php echo $this->renderPartial('_formBaixaDialog', array('model'=>$model)); ?>
<?php $this->endWidget('application.widgets.SComps.SDiag');?>