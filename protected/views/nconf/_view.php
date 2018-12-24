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

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser_cad')); ?>:</b>
	<?php echo CHtml::encode($data->autor->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser_direcionado')); ?>:</b>
	<?php echo CHtml::encode($data->alvo->nome); ?>
	<br />
 
	<b><?php echo CHtml::encode($data->getAttributeLabel('previsao')); ?>:</b>
	<?php echo CHtml::encode($data->previsao); ?>
	<br />
	<b><?php echo CHtml::encode('Comentarios'); ?>: </b><?php echo count($data->comentarios); ?><br>

 	<b><?php echo CHtml::link(CHtml::encode('Comentar'), array('/comentario/create', 'id'=>$data->idnconf)); ?></b>
</div>