<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idstatus')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idstatus), array('view', 'id' => $data->idstatus)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ativo')); ?>:
	<?php echo GxHtml::encode($data->ativo); ?>
	<br />

</div>