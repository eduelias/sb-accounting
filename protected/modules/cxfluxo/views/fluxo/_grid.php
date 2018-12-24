<pre>
<?php if (isset($debug)) print_r($debug);?>
</pre>
<?php $diag = $this->beginWidget('application.widgets.SComps.SDiag',
		array(
			'id' => 'fldiag'
		));
?>
 

 
<?php $this->endWidget();
  ?>
 

 
<?php $diag2 = $this->beginWidget('application.widgets.SComps.SDiag',
			array(
				'id' => 'fldiag2'
			));
	?>
 

 
<?php $this->endWidget();
	?>

<?php
	// this is the date picker
	/*$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
					// 'model'=>$model,
					'name' => 'Fluxo[df_inicial]',
					'language' => 'pt',
					'value' => $model->df_inicial,
					// additional javascript options for the date picker plugin
					'options' => array(
							//'dateFormat'=>'yy-mm-dd',
							'dateFormat' => 'dd/mm/yy',
							'changeMonth' => 'true',
							'changeYear' => 'true',
							'constrainInput' => 'false',
					),
					'htmlOptions' => array(
						'class' => 'cal'
					),
			// DONT FORGET TO ADD TRUE this will create the datepicker return as string
			), true)
			. $this->widget('zii.widgets.jui.CJuiDatePicker',
					array(
							// 'model'=>$model,
							'name' => 'Fluxo[df_final]',
							'language' => 'pt',
							'value' => $model->df_final,
							// additional javascript options for the date picker plugin
							'options' => array(
									//'dateFormat'=>'yy-mm-dd',
									'dateFormat' => 'dd/mm/yy',
									'changeMonth' => 'true',
									'changeYear' => 'true',
									'constrainInput' => 'false',
							),
							'htmlOptions' => array(
								'class' => 'cal'
							),
					// DONT FORGET TO ADD TRUE this will create the datepicker return as string
					), true);*/
	// this is the date picker
	$dateisOn2 = $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
					// 'model'=>$model,
					'name' => 'Fluxo[dv_inicial]',
					'language' => 'pt',
					'value' => $model->dv_inicial,
					// additional javascript options for the date picker plugin
					'options' => array(
							//'dateFormat'=>'yy-mm-dd',
							'dateFormat' => 'dd/mm/yy',
							'changeMonth' => 'true',
							'changeYear' => 'true',
							'constrainInput' => 'false',
							/*'onSelect'=>'js:function(dateText, inst){
								if ($("#Fluxo_dv_final").val() == \'\') $("#Fluxo_dv_final").val($("#Fluxo_dv_inicial").val(); );
							 }'*/
					),
					'htmlOptions' => array(
						'class' => 'cal'
					),
			// DONT FORGET TO ADD TRUE this will create the datepicker return as string
			), true)
			. $this->widget('zii.widgets.jui.CJuiDatePicker',
					array(
							// 'model'=>$model,
							'name' => 'Fluxo[dv_final]',
							'language' => 'pt',
							'value' => $model->dv_final,
							// additional javascript options for the date picker plugin
							'options' => array(
									//'dateFormat'=>'yy-mm-dd',
									'dateFormat' => 'dd/mm/yy',
									'changeMonth' => 'true',
									'changeYear' => 'true',
									'constrainInput' => 'false',
							),
							'htmlOptions' => array(
								'class' => 'cal'
							),
					// DONT FORGET TO ADD TRUE this will create the datepicker return as string
					), true);
	?>
<style>
.grid-view{
	padding:0 !important;
}
table{
	margin-bottom: 0 !important;
}
</style>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'print-form',
	'enableAjaxValidation' => false,
));
?>
<div class="refreshButtom">
<?php echo GxHtml::submitButton("Versão para Impressão"); ?>
<?php echo GxHtml::button('Atualizar Tabela', array('onClick'=>"$.fn.yiiGridView.update('fluxo-grid')")); ?>
</div>
<?php $this->widget('zii.widgets.grid.CGridView',
						   array(
								   'id' => 'fluxo-grid',
								   'dataProvider' => $dp, 
								   'filter' => $model,
								   'afterAjaxUpdate' => "function() {
                                                //jQuery('#Fluxo_df_inicial').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'dateFormat':'dd/mm/yy','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                                //jQuery('#Fluxo_df_final').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'dateFormat':'dd/mm/yy','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                                jQuery('#Fluxo_dv_inicial').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'dateFormat':'dd/mm/yy','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                                jQuery('#Fluxo_dv_final').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'dateFormat':'dd/mm/yy','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                                }",
								   'columns' => array(
										   array(
												   'name' => 'iduser',
												   'header' => 'Usuário',
												   'value' => '$data->iduser0->nome',
												   'filter' => GxHtml::listDataEx(
														   User::model()->findAllAttributes(
																   null, true,
																   array(
																		   'order' => 'nome asc'
																   ))),
												   'headerHtmlOptions' => array(
													   'width' => '50px'
												   ),
												   'htmlOptions' => array(
													   'width' => '50px'
												   )
										   ),/**/
										   array(
												   'name' => 'idempresa_origem',
												   'header' => 'Emp. Pagadora',
												   'value' => 'GxHtml::valueEx($data->idempresaOrigem)',
												   'filter' => $filtroOrigem,
												   'headerHtmlOptions' => array(
													   'width' => '110px'
												   ),
												   'htmlOptions' => array(
													   'width' => '110px'
												   )
										   ),
										   array(
												   'name' => 'idempresa_destino',
												   'header' => 'Emp. Recebedora',
												   'value' => 'GxHtml::valueEx($data->idempresaDestino)',
												   'filter' => $filtroDestino,
												   'headerHtmlOptions' => array(
													   'width' => '110px'
												   ),
												   'htmlOptions' => array(
													   'width' => '110px'
												   )
										   ),
										   array(
												   'name' => 'idconta',
												   'value' => 'GxHtml::valueEx($data->idconta0)',
												   'filter' => GxHtml::listDataEx(
														   Conta::model()->findAllAttributes(
																   null, true,
																   array(
																		   'order' => 'descricao asc'
																   ))),
												   'headerHtmlOptions' => array(
													   'width' => '100px'
												   ),
												   'htmlOptions' => array(
														   'width' => '100px',
														   'style' => 'text-align:center'
												   )
										   ),
										   array(
												   'name' => 'idccusto',
												   'header' => 'C. Custo',
												   'value' => 'GxHtml::valueEx($data->idccusto0)',
												   'filter' => GxHtml::listDataEx(
														   Ccusto::model()->findAllAttributes(
																   null, true,
																   array(
																		   'order' => 'descricao asc'
																   ))),
												   'headerHtmlOptions' => array(
													   'width' => '70px'
												   ),
												   'htmlOptions' => array(
													   'width' => '70px'
												   )
										   ),
										   array(
												   'name' => 'nf',
												   'header' => 'N.F.',
												   'value' => '$data->nf',
												   'headerHtmlOptions' => array(
													   'width' => '50px'
												   ),
												   'htmlOptions' => array(
													   'width' => '50px'
												   )
										   ),
										   /*array(
										           'name' => 'data_faturamento',
										           'value' => '$data->data_faturamento',
										           'header' => 'Fatura',
										           'filter' => $dateisOn,
										           'headerHtmlOptions' => array(
										               'width' => '67px'
										           ),
										           'htmlOptions' => array(
										                   'width' => '67px',
										                   'style' => 'text-align:center'
										           )/*$this->widget(
										                   'zii.widgets.jui.CJuiDatePicker',
										                   array(
										                           'model' => $model,
										                           'attribute' => 'data_faturamento',
										                           'language' => 'pt',
										                           'options' => array(
										                                   'showButtonPanel' => true,
										                                   'changeYear' => true,
										                                   'dateFormat' => 'yy-mm-dd',
										                           ),
										                   ), true)
										   ),*/
										   array(
												   'name' => 'data_vencimento',
												   'value' => '$data->data_vencimento',
												   'header' => 'Vencimento',
												   'filter' => $dateisOn2,
												   'headerHtmlOptions' => array(
													   'width' => '67px'
												   ),
												   'htmlOptions' => array(
														   'width' => '67px',
														   'style' => 'text-align:center'
												   )/*$this->widget(
													'zii.widgets.jui.CJuiDatePicker',
													array(
													'model' => $model,
													'attribute' => 'data_faturamento',
													'language' => 'pt',
													'options' => array(
													'showButtonPanel' => true,
													'changeYear' => true,
													'dateFormat' => 'yy-mm-dd',
													),
													), true)*/
										   ),
										   array(
												   'name' => 'doc_numero',
												   //'value' => '$data->doc',
												   'header' => 'Identificação',
												   'footer' => 'Totais:',
												   'footerHtmlOptions' => array(
														   'style' => 'text-align:right'
												   ),
										   ),
										   array(
												   'name' => 'f_valor_boleto',
												   'header' => 'Valor',
												   'value' => 'GxHtml::encode($data->f_valor_boleto)',
												   'footer' => $model->totValor(),
												   'footerHtmlOptions' => array(
													   'class' => 'bold'
												   ),
												   'headerHtmlOptions' => array(
													   'width' => '75px'
												   ),
												   'htmlOptions' => array(
													   'width' => '75px'
												   )
										   ),
										   array(
												   'name' => 'f_valor_pagamento',
												   'value' => 'GxHtml::encode($data->f_valor_pagamento)',
												   'header' => 'Valor PGTO',
												   'footer' => $model->totVpgto(),
												   'footerHtmlOptions' => array(
													   'class' => 'bold'
												   ),
												   'headerHtmlOptions' => array(
													   'width' => '75px'
												   ),
												   'htmlOptions' => array(
													   'width' => '75px'
												   )
										   ),
										   array(
												   'class' => 'CButtonColumn',
												   'template' => $buttom,
												   'buttons' => array(
														   'baixa' => $diag->buttom(
																   'Yii::app()->createUrl("cxfluxo/fluxo/baixa", array("id"=>$data->idfluxo))'),
														   'work' => array(
																   'label' => '<div class="ico_imagem">&nbsp;</div>',
																   'url' => 'Yii::app()->createUrl("cxfluxo/fluxoArquivo/list", array("id"=>$data->idfluxo))',
																   'onclick' => '$("#fldiag").dialog("open"); return false;',
																   'options' => array(
																		   'title' => 'Ver documentos deste movimento',
																		   'ajax' => array(
					 															   'update' => '#fldiag',
																				   'cache' => false,
																				   'type' => 'get',
																				   'url' => 'js:$(this).attr("href")',
																				   'success' => 'function(html){
																									$("#fldiag2").html(html).dialog("open");
																									return false;
																								}'
																		   )
																   )
														   )
												   )
										   ),
								   ),
						   ));
				   ?>
<?php $this->renderPartial('_legendas'); ?>
<?php
$this->endWidget();
?>