<div class="view">
	<?php echo CHtml::link($data->idarquivo0->real_name, 'images/fluxo/'.$data->idarquivo0->filename, array('target'=>'_new'));?>
	<br>
	<?php echo GxHtml::encode($data->getAttributeLabel('data'));?>:
	<?php echo GxHtml::encode($data->data); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao'));?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>