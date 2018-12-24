<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idformaspg')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idformaspg), array('view', 'id' => $data->idformaspg)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('detalha')); ?>:
	<?php echo GxHtml::encode($data->detalha); ?>
	<br />

</div>