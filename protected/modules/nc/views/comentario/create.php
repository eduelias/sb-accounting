<h1>Inserindo Comentario</h1>
<div class='view'>
	<?php $this->widget('CStarRating',array('allowEmpty'=>false, 'readOnly'=>true, 'model'=>$nc,'attribute'=>'relevancia','ratingStepSize'=>'1','minRating'=>0,'maxRating'=>4)); ?><br><br>
	<b>Setor:</b><?=$nc->setor->descricao?><br>
	<b>De:</b><?=$nc->autor->nome?> <b>Para:</b><?=$nc->alvo->nome?><br /><br />
	<h3><?=$nc->nc->descricao?></h3>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
 
	<div>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dpc,
			'itemView'=>'_viewcom'
		)); ?>
	</div>