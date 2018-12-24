<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idccusto')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idccusto), array('view', 'id' => $data->idccusto)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>