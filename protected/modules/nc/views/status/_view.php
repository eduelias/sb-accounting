<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idstatus')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idstatus), array('view', 'id' => $data->idstatus)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('envia_email')); ?>:
	<?php echo GxHtml::encode($data->envia_email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('envia_historico')); ?>:
	<?php echo GxHtml::encode($data->envia_historico); ?>
	<br />

</div>