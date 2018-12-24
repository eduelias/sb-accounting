<?php
$this->breadcrumbs=array(
	'NC'=>array('/nconf/index'),
	'Inserir',
);

?>
<style>
	.right {
		float: right;
		display:block;
		border: 1px solid #C9E0ED;
		padding: 10px;
		width: 450px;
	}
	.left {
		float: left;
		display:block;
		margin-right: 10px;
		padding:10px;
		border: 1px solid #C9E0ED;
		width: 450px;
	}
	
	div.outer {
		display: inline-block;
	}
	div.titulo {
		color: #298DCD;
		margin:0;
		padding:5px;
	}
	div.container {
		background: #B7D6E7;
		display: table-cell;
		border-left: 5px solid #6FACCF;
	}
	
	div.container div.body {
		padding: 15px;
		background: #EFFDFF;
	}
	div.items b a {
		padding: 10px;
		border: 1px solid #000;
		display: inline-block;
		text-align:center;
		width: 60px;
	}
	
	div.items span.star-rating-control a {
		border: no !important;
	}
</style>
<?php
$this->menu=array(
	array('label'=>'Voltar', 'url'=>array('nconf/return','id'=>$nc->idnconf)),
);
?>
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