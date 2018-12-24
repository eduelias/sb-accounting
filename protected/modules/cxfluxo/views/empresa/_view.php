<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idempresa')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idempresa), array('view', 'id' => $data->idempresa)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('documento')); ?>:
	<?php echo GxHtml::encode($data->documento); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dogrupo')); ?>:
	<?php echo GxHtml::encode($data->dogrupo); ?>
	<br />

</div>