<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos_categoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idprodutos_categoria), array('view', 'id'=>$data->idprodutos_categoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcategoria_pai')); ?>:</b>
	<?php echo CHtml::encode($data->idcategoria_pai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fator_corr')); ?>:</b>
	<?php echo CHtml::encode($data->fator_corr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ativo')); ?>:</b>
	<?php echo CHtml::encode($data->ativo); ?>
	<br />


</div>