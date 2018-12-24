<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idclifor')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idclifor), array('view', 'id' => $data->idclifor)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idtipo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idtipo0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('razao_social')); ?>:
	<?php echo GxHtml::encode($data->razao_social); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nome_fantasia')); ?>:
	<?php echo GxHtml::encode($data->nome_fantasia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doc')); ?>:
	<?php echo GxHtml::encode($data->doc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ie')); ?>:
	<?php echo GxHtml::encode($data->ie); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_cadastro')); ?>:
	<?php echo GxHtml::encode($data->data_cadastro); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('data_atualizacao')); ?>:
	<?php echo GxHtml::encode($data->data_atualizacao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ativo')); ?>:
	<?php echo GxHtml::encode($data->ativo); ?>
	<br />
	*/ ?>

</div>