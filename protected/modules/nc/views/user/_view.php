<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('iduser')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->iduser), array('view', 'id' => $data->iduser)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('login')); ?>:
	<?php echo GxHtml::encode($data->login); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('password')); ?>:
	<?php echo GxHtml::encode($data->password); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('seed')); ?>:
	<?php echo GxHtml::encode($data->seed); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />

</div>