<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idusuario), array('view', 'id'=>$data->idusuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idclifor')); ?>:</b>
	<?php echo CHtml::encode($data->idclifor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ativo')); ?>:</b>
	<?php echo CHtml::encode($data->ativo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seed')); ?>:</b>
	<?php echo CHtml::encode($data->seed); ?>
	<br />


</div>