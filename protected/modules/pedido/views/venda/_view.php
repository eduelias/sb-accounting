<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idfluxo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idfluxo), array('view', 'id' => $data->idfluxo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idfluxo_forma')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idfluxo_forma)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idclifor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idclifor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idusuario')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idusuario)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ativo')); ?>:
	<?php echo GxHtml::encode($data->ativo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('previsao')); ?>:
	<?php echo GxHtml::encode($data->previsao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_cadastro')); ?>:
	<?php echo GxHtml::encode($data->data_cadastro); ?>
	<br />

</div>