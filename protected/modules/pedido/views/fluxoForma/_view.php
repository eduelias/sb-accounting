<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idfluxo_forma')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idfluxo_forma), array('view', 'id' => $data->idfluxo_forma)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('entrada')); ?>:
	<?php echo GxHtml::encode($data->entrada); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>