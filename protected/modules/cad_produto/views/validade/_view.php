<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idprodutos_validade')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idprodutos_validade), array('view', 'id' => $data->idprodutos_validade)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idunidade')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->unidade)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tipo')); ?>:
	<?php echo GxHtml::encode($data->tipo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('valor')); ?>:
	<?php echo GxHtml::encode($data->valor); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('periodo')); ?>:
	<?php echo GxHtml::encode($data->periodo); ?>
	<br />

</div>