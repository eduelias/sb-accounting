<?php
$this->breadcrumbs=array(
	'Não Conformidade'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Nova', 'url'=>array('create')),
	array('label'=>'NCs de Entrada', 'url'=>array('index')),
	array('label'=>'NCs de Saída', 'url'=>array('indexmine')),
	array('label'=>'[Públicas]'),
);
	$cadeado = array('name'=>'publica','visible'=>false);
	$buttons = '{comentar}';
	if (User::isGerente())
	{
		$cadeado = array(
			'type'=>'raw',
			'header'=>'',
			'name'=>'publica',
			'filter'=>array('N'=>'Privadas','S'=>'Publicas'),
			'value'=>'"<span class=\"".(($data->publica)?"":"lock")."\"></span>"',
			'htmlOptions'=>array('width'=>'10'),
		);
		
		$buttons = '{comentar}{work}{update}';
	}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('nconf-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
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
	.urgente {
		background: url("images/grid_sprite.png") no-repeat scroll 0 -18px transparent;
	    cursor: pointer;
	    display: inline-block;
	    height: 18px;
	    padding-left: 14px;
	}
	.alerta{
		background: url("images/grid_sprite.png") no-repeat scroll 0 0 transparent;
	    cursor: pointer;
	    display: inline-block;
	    height: 18px;
	    padding-left: 14px;
	}
	.normal{
		 background: url("images/grid_sprite.png") no-repeat scroll 0 -36px transparent;
	    cursor: pointer;
	    display: inline-block;
	    height: 18px;
	    padding-left: 14px;
	}
	
	.unlock{
		background: url("images/grid_sprite.png") no-repeat scroll 0 -142px transparent;
	    cursor: pointer;
	    display: inline-block;
	    height: 15px;
	    padding-left: 14px;
	}
	
	.lock{
		 background: url("images/grid_sprite.png") no-repeat scroll 0 -128px transparent;
	    cursor: pointer;
	    display: inline-block;
	    height: 14px;
	    padding-left: 14px;
	}

	.grid-view table.items th, .grid-view table.items td {
		border: none;
		border-bottom: 1px solid lightGray;
	}

	.bold td{
		font-weight:bold !important;
	}

	.to_me {
		background: url("images/strip.png") no-repeat scroll -958px -2px transparent;
	    cursor: pointer;
	    display: inline-block;
	    height: 18px;
	    padding-left: 13px;
	    width: 6px;
	}
	
</style>
<?php $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'nconf-grid', 
			'dataProvider'=>$model->search(false),
			'filter'=>$model, 
			'template'=>'{pager}{items}{summary}',
			'rowCssClassExpression'=>'(($data->iduser_direcionado == Yii::app()->user->numid)?"bold":"")',
			'filterPosition'=>'header',
			'columns'=>array(
				$cadeado,
				array(
					'type'=>'raw',
					'name'=>'relevancia',
					'header'=>'',
					'filter'=>Nconf::getRelevanciaList(),
					'value'=>'"<span class=\"".(($data->relevancia == 4)?"urgente":(($data->relevancia < 1)?"normal":"alerta"))."\"></span>"',
					'htmlOptions'=>array('width'=>'10'),
				),
				/*array(
					'name'=>'relevancia',
					'filter'=>Nconf::getRelevanciaList(),
					'value'=>'$data->relevancia_desc',
					'htmlOptions'=>array('width'=>'80'),
				),*/
				
				array(
					'name'=>'idsetor',
					'filter'=>Setor::getSetorlist(),
					'value'=>'$data->setor->descricao',
					'htmlOptions'=>array('width'=>'100'),
				),
				array(
					'name'=>'iduser_cad',
					'filter'=>User::getUserlist(),
					'value'=>'$data->autor->nome',
					'htmlOptions'=>array('width'=>'105'),
				),
				array(
					'type'=>'raw',
					'header'=>'',
					'value'=>'"<span class=\"".(($data->iduser_direcionado == Yii::app()->user->numid)?"to_me":"")."\"></span>"',
					'htmlOptions'=>array('width'=>'10'),
				),
				array(
					'name'=>'iduser_direcionado',
					'filter'=>User::getUserlist(),
					'value'=>'$data->alvo->nome',
					'htmlOptions'=>array('width'=>'105'),
				),
				'nc.descricao',
				array(
					'name'=>'data_cadastro',
					'filter'=>Nconf::getPeriodos(),
					'value'=>'$data->data_cadastro', 
					'htmlOptions'=>array('width'=>'120'),
				),
				//'status',
				array(
					'class'=>'CButtonColumn',
					'header'=>CHtml::dropDownList('pageSize',
				        $pageSize,
				        array(10=>10,20=>20,50=>50,100=>100),
				        array(
				        	'onchange'=>
				        	"$.fn.yiiGridView.update('nconf-grid',{ data:{pageSize: $(this).val() }})",
				    	)
				    ),
					'template'=>$buttons,
					'buttons'=> array
					(
						'comentar'=>array
						(
							'labelExpression'=>'$data->coment_count',
							'imageUrl'=>Yii::app()->request->baseUrl.'/images/coment.png',
							'url'=>'Yii::app()->createUrl("comentario/create",array("id"=>$data->idnconf))',
						),
						'work'=>array(
						'label'=>'[X]',
						'url'=>'Yii::app()->createUrl("/nconf/changestatus", array("id"=>$data->idnconf))',
						'onclick'=>'$("#change-status").dialog("open"); return false;',
						'options'=> array(
							'ajax'=> array(							
								'update'=>'#change-status',
								'cache'=>false,
								'type'=>'get',
								'url'=>'js:$(this).attr("href")',
								'success'=>'function(html){
									$("#change-status").html(html);
									$("#change-status").dialog("open");
									return false;
								}'
							)
						)
					)
					)
				),
			))); ?>
</div><!-- search-form -->


<?php echo $this->renderPartial('changeStatusDialog', array('model'=>$model), false, true); ?>