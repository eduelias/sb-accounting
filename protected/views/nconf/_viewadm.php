<div class="<?=$data->cssRelevancia?>">
		<?php $this->widget('CStarRating',array(
				'id'=>'Star_'.uniqid(),
				'name'=>'Star_'.uniqid(),
				'value'=>$data->relevancia,
				'ratingStepSize'=>'1',
				'minRating'=>0,
				'maxRating'=>4,
				'readOnly'=>true
			)); 
		?>
	<br>
	
	
	<h3><?php echo CHtml::encode($data->nc->descricao); ?></h3>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('idsetor')); ?>:</b>
	<?php echo CHtml::encode($data->setor->descricao); ?>
	<br />

	<b><?php echo CHtml::encode('De'); ?>:</b>
	<?php echo CHtml::encode($data->autor->nome); ?>
	<br />

	<b><?php echo CHtml::encode('Para'); ?>:</b>
	<?php echo CHtml::encode($data->alvo->nome); ?>
	<br />
 
	<b><?php echo CHtml::encode($data->getAttributeLabel('previsao')); ?>:</b>
	<?php echo CHtml::encode($data->previsao); ?>
	<br />
	<b><?php echo CHtml::encode('Comentarios'); ?>: </b><?php echo count($data->comentarios); ?><br>
	<?php if (count($data->comentarios) > 0) { ?>
	<b><?php echo CHtml::encode('Ultimo Comentário');?>:</b><br />
	<div class='container'>
		<div class='titulo'>
			De: <?php echo $data->comentarios[count($data->comentarios)-1]->autor->nome; ?> em: <?php echo $data->comentarios[count($data->comentarios)-1]->data; ?>
		</div>
		
		<div class='body'>
			<?php echo $data->comentarios[count($data->comentarios)-1]->comentario; ?>
		</div>
	</div>
 	<?php } ?>
 	<b><?php echo CHtml::link(CHtml::encode('Comentar'), array('/comentario/create', 'id'=>$data->idnconf)); ?><?php echo CHtml::link(CHtml::encode('Detalhar'), array('view', 'id'=>$data->idnconf)); ?><?php echo CHtml::link(CHtml::encode('Editar'), array('update', 'id'=>$data->idnconf)); ?></b>
</div>