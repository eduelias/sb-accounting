<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idprodutos')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idprodutos), array('view', 'id' => $data->idprodutos)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idunidade')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->unidade)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idcategoria')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->categoria)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idusuario')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->usuario)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idtipo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tipo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idvalidade')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->validade)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nomeprod')); ?>:
	<?php echo GxHtml::encode($data->nomeprod); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('desc_max')); ?>:
	<?php echo GxHtml::encode($data->desc_max); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('desc_min')); ?>:
	<?php echo GxHtml::encode($data->desc_min); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('qtde_min')); ?>:
	<?php echo GxHtml::encode($data->qtde_min); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_atualizacao')); ?>:
	<?php echo GxHtml::encode($data->data_atualizacao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_cadastro')); ?>:
	<?php echo GxHtml::encode($data->data_cadastro); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ativo')); ?>:
	<?php echo GxHtml::encode($data->ativo); ?>
	<br />
	*/ ?>

</div>