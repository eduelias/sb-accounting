<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idunidade')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idunidade), array('view', 'id' => $data->idunidade)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('simbolo')); ?>:
	<?php echo GxHtml::encode($data->simbolo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('unidade')); ?>:
	<?php echo GxHtml::encode($data->unidade); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ativo')); ?>:
	<?php echo GxHtml::encode($data->ativo); ?>
	<br />

</div>