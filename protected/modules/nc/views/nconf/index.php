<?php
$this->breadcrumbs = array(
	'Não Conformidade',
);

$this->menu = array(
	array('label' => 'Nova', 'url' => array('create')),
	array('label'=>'NCs de Entrada', 'url'=>array('entrada')),
	array('label'=>'NCs de Saída', 'url'=>array('saida')),
	array('label'=>'Públicas', 'url'=>array('publicas')),
	array('label'=>'Histórico', 'url'=>array('historico')),
);
?>
<?php $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
?>
<?php
if ($mine) {
	$dp = $model->cxSaida();
	$this->menu = array(
		array('label' => 'Nova', 'url' => array('create')),
		array('label' => 'NCs de Entrada', 'url' => array('index')),
		array('label' => '[NCs de Saída]'),
		array('label' => 'Públicas', 'url' => array('admin')),
	);
	$user = array(
		'name'        => 'iduser_direcionado',
		'filter'      => GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
		'value'       => '$data->alvo->nome',
		'htmlOptions' => array('width' => '105'),
	);
	$title = 'NC Criadas por mim';
} else {
	$dp = $model->cxEntrada();
	$this->menu = array(
		array('label' => 'Nova', 'url' => array('create')),
		array('label' => '[NCs de Entrada]'),
		array('label' => 'NCs de Saída', 'url' => array('indexmine')),
		array('label' => 'Públicas', 'url' => array('admin')),
	);
	$user = array(
		'name'        => 'iduser_cad',
		'filter'      => GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
		'value'       => '$data->autor->nome',
		'htmlOptions' => array('width' => '105'),
	);
	$title = 'NC Direcionadas à mim';
}
?>
<?php
$relevancia_lista = Nconf::getRelevanciaList();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'                    => 'nconf-grid',
	'dataProvider'          => $dp,
	'filter'                => $model,
	'template'              => '{pager}{items}{summary}',
	'rowCssClassExpression' => '(($data->iduser_direcionado == Yii::app()->user->numid)?"bold":"")',
	'filterPosition'        => 'header',
	'columns'               => array(
		array(
			'type'        => 'raw',
			'name'        => 'relevancia',
			'header'      => '',
			'filter'      => $relevancia_lista,
			'value'       => '"<span class=\"".(($data->relevancia == 4)?"urgente":(($data->relevancia < 1)?"normal":"alerta"))."\"></span>"',
			'htmlOptions' => array(
				'width' => '10',
			),
		),
		/*array(
		 'name'=>'relevancia',
		 'filter'=>Nconf::getRelevanciaList(),
		 'value'=>'$data->relevancia_desc',
		 'htmlOptions'=>array('width'=>'80'),
		 ),*/

		array(
			'name'        => 'idsetor',
			'filter'      => GxHtml::listDataEx(Setor::model()->findAllAttributes(null, true)),
			'value'       => '$data->setor->descricao',
			'htmlOptions' => array('width' => '100'),
		),
		$user,
		array(
			'type'        => 'raw',
			'header'      => '',
			'value'       => '"<span class=\"".(($data->iduser_direcionado == Yii::app()->user->numid)?"to_me":"")."\"></span>"',
			'htmlOptions' => array('width' => '10', 'title' => 'NC de Entrada.'),
		),
		'nc.descricao',
		array(
			'name'        => 'data_cadastro',
			'filter'      => Nconf::getPeriodos(),
			'value'       => '$data->data_cadastro',
			'htmlOptions' => array('width' => '120', 'height' => '36'),
		),
		array(
			'name'   => 'status',
			'value'  => '$data->status',
			'filter' => false,
		),
		//'status',
		array(
			'class'       => 'CButtonColumn',
			'header'      => CHtml::dropDownList('pageSize',
			$pageSize,
			array(10 => 10, 20 => 20, 50 => 50, 100 => 100),
			array(
				'onchange' => "$.fn.yiiGridView.update('nconf-grid',{ data:{pageSize: $(this).val() }})",
			)),
			'htmlOptions' => array(
				'width' => '54'
			),
			'template'    => '{work}{comentar}{editar}',
			'buttons'     => array(
				'editar'   => array(
					'label'   => '<div class="ch_editar">&nbsp;</div>',
					'title'   => "Editar esta NC",
					'options' => array(
						'class' => 'ch_editar',
						'title' => 'Clique para Editar esta NC.'
					),
					'url'     => 'Yii::app()->createUrl("/nc/nconf/update",array("id"=>$data->idnconf))'
				),
				'comentar' => array(
					'labelExpression' => '$data->coment_count',
					'label'           => '&nbsp;',
					'options'         => array(
						'class' => 'ch_comentario',
						'title' => 'Enviar um comentário.'
					),
					'title'           => 'Enviar um comentário',
					//'imageUrl'=>Yii::app()->request->baseUrl.'/images/coment.png',
					'url'             => 'Yii::app()->createUrl("nc/comentario/create",array("id"=>$data->idnconf))',
				),
				'work'     => array(
					'label'   => '<div class="ch_status">&nbsp;</div>',
					'url'     => 'Yii::app()->createUrl("/nc/nconf/changestatus", array("id"=>$data->idnconf))',
					'onclick' => '$("#change-status").dialog("open"); return false;',
					'options' => array(
						'title' => 'Mudar STATUS desta NC.',
						'ajax'  => array(
							'update'  => '#change-status',
							'cache'   => false,
							'type'    => 'get',
							'url'     => 'js:$(this).attr("href")',
							'success' => 'function(html){
										$("#change-status").html(html).dialog("open");
										return false;
									}'
						)
					)
				)
			)
		),
	)));
?>
<?php echo $this->renderPartial('changeStatusDialog', array('model' => $model), false, true);?>
