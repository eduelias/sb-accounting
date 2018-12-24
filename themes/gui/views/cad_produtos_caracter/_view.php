<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos_caracter')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idprodutos_caracter), array('view', 'id'=>$data->idprodutos_caracter)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos')); ?>:</b>
	<?php echo CHtml::encode($data->idprodutos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dim_x')); ?>:</b>
	<?php echo CHtml::encode($data->dim_x); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dim_y')); ?>:</b>
	<?php echo CHtml::encode($data->dim_y); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dim_z')); ?>:</b>
	<?php echo CHtml::encode($data->dim_z); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_bruto')); ?>:</b>
	<?php echo CHtml::encode($data->peso_bruto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_liquido')); ?>:</b>
	<?php echo CHtml::encode($data->peso_liquido); ?>
	<br />


</div>