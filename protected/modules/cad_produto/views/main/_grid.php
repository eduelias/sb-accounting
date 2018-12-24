<?php $this->widget('zii.widgets.grid.CGridView',
		array(
				'id' => 'cad-produtos-grid',
				'dataProvider' => $model->search(),
				'filter' => $model,
				'columns' => array(
						array(
								'name' => 'idprodutos',
								'type' => 'raw',
								'value' => 'CHtml::link($data->idprodutos,array("view","id"=>$data->idprodutos))',
								'htmlOptions'=>array(
									'width'=>'10px',
									'style'=>'text-align:center'
								)
						),
						'nomeprod',
						array(
								'name' => 'idunidade',
								'value' => '$data->unidade->unid',
								'filter' => GxHtml::listDataEx(
										CadProdutosUnidade::model()->findAllAttributes(
												null, true)),
						),
						'preco.valor_tabela',
						array(
								'name' => 'idcategoria',
								'value' => 'GxHtml::valueEx($data->categoria)',
								'filter' => GxHtml::listDataEx(
										CadProdutosCategoria::model()->findAllAttributes(
												null, true)),
						), 
						array(
								'name' => 'ativo',
								'value' => '($data->ativo == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
								'filter' => array(
										'0' => Yii::t('app', 'No'),
										'1' => Yii::t('app', 'Yes')
								),
						),
						array(
							'class' => 'CButtonColumn',
						),
				),
		));
?>
