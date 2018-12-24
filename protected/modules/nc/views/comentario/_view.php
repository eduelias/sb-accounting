<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcomentario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcomentario), array('view', 'id'=>$data->idcomentario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnconf')); ?>:</b>
	<?php echo CHtml::encode($data->idnconf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publico')); ?>:</b>
	<?php echo CHtml::encode($data->publico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />


</div>