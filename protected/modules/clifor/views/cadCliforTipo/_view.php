<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idtipo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idtipo), array('view', 'id' => $data->idtipo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>