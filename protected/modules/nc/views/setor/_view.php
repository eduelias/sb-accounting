<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idsetor')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idsetor), array('view', 'id' => $data->idsetor)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('iduser_responsavel')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->responsavel)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>