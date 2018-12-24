<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idconta')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idconta), array('view', 'id' => $data->idconta)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>