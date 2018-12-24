<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idfluxo_arquivo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idfluxo_arquivo), array('view', 'id' => $data->idfluxo_arquivo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idarquivo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idarquivo0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idfluxo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idfluxo0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data')); ?>:
	<?php echo GxHtml::encode($data->data); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>