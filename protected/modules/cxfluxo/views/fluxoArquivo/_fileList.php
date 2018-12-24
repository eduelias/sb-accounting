<div class="view">
<?php if (($data->idarquivo0->ext == 'png') or ($data->idarquivo0->ext == 'jpg') or ($data->idarquivo0->ext == 'gif')) {?>
<?php echo CHtml::image('images/fluxo/'.$data->idarquivo0->filename,
		$data->descricao,
		array("class" => "clickme", "title" => $data->descricao));
?>
<?php } else {?>
<?php echo CHtml::link($data->idarquivo0->real_name, 'images/fluxo/'.$data->idarquivo0->filename);?>
<?php }?>
	<br>
	<?php echo GxHtml::encode($data->getAttributeLabel('data'));?>:
	<?php echo GxHtml::encode($data->data); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao'));?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />

</div>