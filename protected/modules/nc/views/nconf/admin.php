<?php
$this->breadcrumbs = array(
	'Não Conformidade' => array('index'),
	'Gerenciar',
);

$this->menu = array(
	array('label' => 'Nova', 'url' => array('create')),
	array('label'=>'NCs de Entrada', 'url'=>array('entrada')),
	array('label'=>'NCs de Saída', 'url'=>array('saida')),
	array('label'=>'Públicas', 'url'=>array('publicas')),
	array('label'=>'Histórico', 'url'=>array('historico')),
);
$cadeado = array('name' => 'publica', 'visible' => false);
$buttons = '{comentar}';
if (User::isGerente()) {
	$cadeado = array(
		'type'        => 'raw',
		'header'      => '',
		'name'        => 'publica',
		'filter'      => array('N' => 'Privadas', 'S' => 'Publicas'),
		'value'       => '"<span class=\"".(($data->publica)?"":"lock")."\">&nbsp;</span>"',
		'htmlOptions' => array('width' => '10'),
	);

	$buttons = '{comentar}{work}{editar}';
}
?>
<?php $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'                    => 'nconf-grid',
	'dataProvider'          => $model->cxPublica(),
	'filter'                => $model,
	'template'              => '{pager}{items}{summary}',
	'rowCssClassExpression' => '(($data->iduser_direcionado == Yii::app()->user->numid)?"bold":"")',
	'filterPosition'        => 'header',
	'columns'               => array(
		$cadeado,
		array(
			'type'        => 'raw',
			'name'        => 'relevancia',
			'header'      => '',
			'filter'      => Nconf::getRelevanciaList(),
			'value'       => '"<span class=\"".(($data->relevancia == 4)?"urgente":(($data->relevancia < 1)?"normal":"alerta"))."\"></span>"',
			'htmlOptions' => array('width' => '10'),
		),
		/*array(
		 'name'=>'relevancia',
		 'filter'=>Nconf::getRelevanciaList(),
		 'value'=>'$data->relevancia_desc',
		 'htmlOptions'=>array('width'=>'80'),
		 ),*/

		array(
			'name'        => 'idsetor',
			'filter'      => Setor::getSetorlist(),
			'value'       => '$data->setor->descricao',
			'htmlOptions' => array('width' => '100'),
		),
		array(
			'name'        => 'iduser_cad',
			'filter'      => User::getUserlist(),
			'value'       => '$data->autor->nome',
			'htmlOptions' => array('width' => '105'),
		),
		array(
			'type'        => 'raw',
			'header'      => '',
			'value'       => '"<span class=\"".(($data->iduser_direcionado == Yii::app()->user->numid)?"to_me":"")."\"></span>"',
			'htmlOptions' => array('width' => '10'),
		),
		array(
			'name'        => 'iduser_direcionado',
			'filter'      => User::getUserlist(),
			'value'       => '$data->alvo->nome',
			'htmlOptions' => array('width' => '105'),
		),
		'nc.descricao',
		array(
			'name'        => 'data_cadastro',
			'filter'      => Nconf::getPeriodos(),
			'value'       => '$data->data_cadastro',
			'htmlOptions' => array('width' => '120'),
		),
		'status',
		array(
			'class'    => 'CButtonColumn',
			'header'   => CHtml::dropDownList('pageSize',
			$pageSize,
			array(10 => 10, 20 => 20, 50 => 50, 100 => 100),
			array(
				'onchange' => "$.fn.yiiGridView.update('nconf-grid',{ data:{pageSize: $(this).val() }})",
			)),
			'template' => $buttons,
			'buttons'  => array(
				'comentar' => array(
					'labelExpression' => '$data->coment_count',
					'label'           => '&nbsp;',
					'options'         => array(
						'class' => 'ch_comentario',
						'title' => 'Enviar um comentário.'
					),
					'url'             => 'Yii::app()->createUrl("/nc/comentario/create",array("id"=>$data->idnconf))',
				),
				'work'     => array(
					'label'   => '&nbsp;',
					'url'     => 'Yii::app()->createUrl("/nc/nconf/changestatus", array("id"=>$data->idnconf))',
					'onclick' => '$("#change-status").dialog("open"); return false;',
					'options' => array(
						'class' => 'ch_status',
						'title' => 'Mudar Status Atual.',
						'ajax'  => array(
							'update'  => '#change-status',
							'cache'   => false,
							'type'    => 'get',
							'url'     => 'js:$(this).attr("href")',
							'success' => 'function(html){
										$("#change-status").html(html);
										$("#change-status").dialog("open");
										return false;
									}'
						)
					)
				),
				'editar'   => array(
					'label'   => '<div class="ch_editar">&nbsp;</div>',
					'title'   => "Editar esta NC",
					'options' => array(
						'class' => 'ch_editar',
						'title' => 'Clique para Editar esta NC.'
					),
					'url'     => 'Yii::app()->createUrl("/nc/nconf/update",array("id"=>$data->idnconf))'
				),
			)
		),
	)));
?>
<!-- search-form -->


<?php echo $this->renderPartial('changeStatusDialog', array('model' => $model), false, true);
?>