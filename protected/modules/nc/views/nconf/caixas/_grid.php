<?php /*
 * @var $list - dataProvider do grid
 * @var $model - $model a ser listado
 * @var $cadeado - definição da coluna 'privado'
 * @var $user - Definição da coluna 'user' do grid
 */
?>
<?php $d_empresa = $this->beginWidget('application.widgets.SComps.SDiag',
	array(
	'id'      => 'change_status',
	'options' => array(
		'height'      => '400', 'width'       => '380',
		'beforeclose' => 'js: function(event, ui){ $.fn.yiiGridView.update("nconf-grid") }',
	)
));
?>
<?php $this->endWidget();
?>

<?php
// this is the date picker
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker',
	array(
	// 'model'=>$model,
	'name'        => 'Nconf[dt_inicio]',
	'language'    => 'pt',
	'value'       => $model->dt_inicio,
	// additional javascript options for the date picker plugin
	'options'     => array(
		//'dateFormat'=>'yy-mm-dd',
		'dateFormat'     => 'dd/mm/yy',
		'changeMonth'    => 'true',
		'changeYear'     => 'true',
		'constrainInput' => 'false',
	),
	'htmlOptions' => array(
		'class' => 'cal'
	),
	// DONT FORGET TO ADD TRUE this will create the datepicker return as string
), true).$this->widget('zii.widgets.jui.CJuiDatePicker',
	array(
	// 'model'=>$model,
	'name'        => 'Nconf[dt_fim]',
	'language'    => 'pt',
	'value'       => $model->dt_fim,
	// additional javascript options for the date picker plugin
	'options'     => array(
		//'dateFormat'=>'yy-mm-dd',
		'dateFormat'     => 'dd/mm/yy',
		'changeMonth'    => 'true',
		'changeYear'     => 'true',
		'constrainInput' => 'false',
	),
	'htmlOptions' => array(
		'class' => 'cal'
	),
	// DONT FORGET TO ADD TRUE this will create the datepicker return as string
), true);
?>

<?php $pageSize = Yii::app()->user->getState('pageSize',
	Yii::app()->params['defaultPageSize']);
?>
<?php
$relevancia_lista = Nconf::getRelevanciaList();
$user_alvo = isset($user_alvo) ? $user_alvo : array(
	'name'    => 'User Direcionado', 'visible' => false
);
$this->widget('zii.widgets.grid.CGridView',
	array(
	'id'              => 'nconf-grid',
	'dataProvider'    => $list,
	'filter'          => $model,
	'template'        => '{pager}{items}{pager}{summary}',
	'afterAjaxUpdate' => "function() {
                                                jQuery('#Nconf_dt_inicio').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'dateFormat':'dd/mm/yy','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                                jQuery('#Nconf_dt_fim').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'dateFormat':'dd/mm/yy','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                                }",
	//'rowCssClassExpression' => '(($data->getLida())?"bold":"")',
	'filterPosition'  => 'header',
	'columns'         => array(
		/*array(
		 'type'        => 'raw',
		 'header'      => '',
		 'value'       => '"<span class=\"".($data->lida?"":"to_me")."\"></span>"',
		 'htmlOptions' => array('width' => '10px', 'title' => 'Atualizado!'),
		 ),*/
		array(
			'type'        => 'raw',
			'header'      => '',
			'name'        => 'publica',
			'filter'      => array(
				'N' => 'Privadas', 'S' => 'Publicas'
			),
			'value'       => '"<span class=\"".(($data->publica)?"":"lock")."\">&nbsp;</span>"',
			'htmlOptions' => array(
				'width' => '10px'
			),
		),
		array(
			'type'        => 'raw',
			'name'        => 'relevancia',
			'header'      => '',
			'filter'      => $relevancia_lista,
			'value'       => '"<span class=\"".(($data->relevancia == 4)?"urgente":(($data->relevancia < 1)?"normal":"alerta"))."\"></span>"',
			'htmlOptions' => array(
				'width' => '10px',
			),
		),
		/*array(
		 'name' => 'idsetor',
		 'filter' => GxHtml::listDataEx(
		 Setor::model()->findAllAttributes(
		 null, true)),
		 'value' => '$data->setor->descricao',
		 'htmlOptions' => array(
		 'width' => '50px'
		 ),
		 ),*/
		$user,
		$user_alvo,
		array(
			'type'        => 'raw',
			'header' 	=> 'Não Conformidade',
			'name'        => 'nc_tipo_descricao',
			'value'       => '"<span class=\"".($data->lida?"":"to_me")."\">&nbsp;</span>".$data->nc->descricao',
			'htmlOptions' => array(
				'width' => '120px'
			)
		),
		/*array(
		 'name'        => 'descricao',
		 'value'       => '$data->descricao',
		 'filter'      => false,
		 'header'      => 'Detalhe',
		 'htmlOptions' => array(
		 'width' => '240px'
		 )
		 ),*/
		/**/
		array(
			'name'        => 'data_cadastro',
			'header'      => 'Data',
			'filter'      => $dateisOn, //Nconf::getPeriodos(),
				'value'       => '$data->data_cadastro',
			'htmlOptions' => array(
				'width'  => '60',
				'height' => '36',
				'class'  => 'div_center'
			),
		),
		array(
			'name'        => 'status',
			'value'       => '$data->status',
			'filter' 	=> false,
			//'filter' => GxHtml::listDataEx(Status::model()->findAllAttributes(null, true)),
			'htmlOptions' => array(
				'width' => '50', 'class' => 'div_center'
			)
		),
		//'status',
		array(
			'class'    => 'CButtonColumn',
			'header'   => CHtml::dropDownList('pageSize',
			$pageSize,
			array(
				10 => 10,
				20 => 20,
				50 => 50,
				100 => 100
			),
			array(
				'onchange' => "$.fn.yiiGridView.update('nconf-grid',{ data:{pageSize: $(this).val() }})",
			)),
			'template' => '{work}{comentar}{editar}',
			//'template'=>'{work}{editar}',
			'buttons'  => array(
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
					'label'   => '<div class="ch_comentario">&nbsp;</div>',
					'url'     => 'Yii::app()->createUrl("/nc/comentario/comenta", array("id"=>$data->idnconf))',
					'onclick' => '$("#change_status").dialog("open"); return false;',
					'options' => array(
						'title' => 'Mudar STATUS desta NC.',
						'ajax'  => array(
							'update'  => '#change_status',
							'cache'   => false,
							'type'    => 'get',
							'url'     => 'js:$(this).attr("href")',
							'success' => 'function(html){
										$("#change_status").html(html).dialog("open");
										return false;
									}'
						)
					)
				),
				//'comentar' => $d_empresa->buttom('Yii::app()->createUrl("/nc/comentario/create",array("id"=>$data->idnconf))'),
				'work'     => array(
					'label'   => '<div class="ch_status">&nbsp;</div>',
					'url'     => 'Yii::app()->createUrl("/nc/nconf/changestatus", array("id"=>$data->idnconf))',
					'onclick' => '$("#change_status").dialog("open"); return false;',
					'options' => array(
						'title' => 'Mudar STATUS desta NC.',
						'ajax'  => array(
							'update'  => '#change_status',
							'cache'   => false,
							'type'    => 'get',
							'url'     => 'js:$(this).attr("href")',
							'success' => 'function(html){
										$("#change_status").html(html).dialog("open");
										return false;
									}'
						)
					)
				)
			)
		),
		array(
			'type'        => 'raw',
			'name'        => 'last_com_info',
			'value'       => '$data->last_com_info',
			'filter'      => false,
			'htmlOptions' => array(
				'width' => '120px',
			)
		),
	)
));
?>
