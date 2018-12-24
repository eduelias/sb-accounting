<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos_tipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idprodutos_tipo), array('view', 'id'=>$data->idprodutos_tipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />


</div>