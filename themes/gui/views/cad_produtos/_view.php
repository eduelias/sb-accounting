<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idprodutos), array('view', 'id'=>$data->idprodutos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idunidade')); ?>:</b>
	<?php echo CHtml::encode($data->idunidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->idprodutos_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuario')); ?>:</b>
	<?php echo CHtml::encode($data->idusuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->idprodutos_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->idprodutos_descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idprodutos_validade')); ?>:</b>
	<?php echo CHtml::encode($data->idprodutos_validade); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nomeprod')); ?>:</b>
	<?php echo CHtml::encode($data->nomeprod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_max')); ?>:</b>
	<?php echo CHtml::encode($data->desc_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_min')); ?>:</b>
	<?php echo CHtml::encode($data->desc_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qtde_min')); ?>:</b>
	<?php echo CHtml::encode($data->qtde_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_atualizacao')); ?>:</b>
	<?php echo CHtml::encode($data->data_atualizacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_cadastro')); ?>:</b>
	<?php echo CHtml::encode($data->data_cadastro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ativo')); ?>:</b>
	<?php echo CHtml::encode($data->ativo); ?>
	<br />

	*/ ?>

</div>