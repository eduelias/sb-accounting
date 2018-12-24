<style>
	.right {
		float: right;
		display:block;
		border: 1px solid #C9E0ED;
		padding: 10px;
		width: 450px;
		margin-bottom:40px;
	}
	.left {
		float: left;
		display:block;
		margin-right: 10px;
		padding:10px;
		border: 1px solid #C9E0ED;
		width: 450px;
		margin-bottom:40px;
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
	
	}
	
	div.items span.star-rating-control a {
		border: no !important;
	}
</style>
<?php
$this->breadcrumbs=array(
	'Nconf'=>array('index'),
	$nc->autor->nome.': '.$nc->nc->descricao,
);

$this->menu=array(
	array('label'=>'Nova', 'url'=>array('create')),
	array('label'=>'NCs de Entrada', 'url'=>array('index')),
	array('label'=>'NCs de Saída', 'url'=>array('indexmine')),
	array('label'=>'Públicas', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>'  [<img alt="Mostrar" src="/solbril/assets/d7172ef9/gridview/view.png">]  '),
);
?>
<?php $this->renderPartial('_view',array('data'=>$nc)); ?>
<div class="left">
<h3>Comentários</h3>
<?php echo $this->renderPartial('/comentario/_form', array('model'=>$com)); ?>
<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dpcom,
			'itemView'=>'/comentario/_viewcom'
		)); ?>
</div>
<div class="right">
	<h3>Status</h3>
<?php 
	//foreach ($model->sts as $st) 
	//	$this->renderPartial('_work_status',array('st'=>$st));
?>
</div>
