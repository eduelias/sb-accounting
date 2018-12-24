<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idprodutos_categoria')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idprodutos_categoria), array('view', 'id' => $data->idprodutos_categoria)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idcategoria_pai')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->categoria_pai)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fator_corr')); ?>:
	<?php echo GxHtml::encode($data->fator_corr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ativo')); ?>:
	<?php echo GxHtml::encode($data->ativo); ?>
	<br />

</div>