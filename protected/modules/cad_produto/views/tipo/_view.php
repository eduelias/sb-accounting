<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idprodutos_tipo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idprodutos_tipo), array('view', 'id' => $data->idprodutos_tipo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>