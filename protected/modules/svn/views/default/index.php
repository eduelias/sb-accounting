<?php
$this->widget('zii.widgets.grid.CGridView',
		array(
				'filter' => $model,
				'id' => 'svn-grid',
				'dataProvider' => $model->search(),
				'template' => '{pager}{items}{pager}{summary}',
				'columns' => array(
						'repos_text_status',
						'text_status',
						'revision',
						'path',
						'cmt_author',
						'msg',
						array(
								'class' => 'CButtonColumn',
								'template' => '{work}',
								'buttons' => array(
										'work' => array(
												'label' => '<div class="ch_status">X</div>',
												'url' => 'Yii::app()->createUrl("/svn/default/update", array("path"=>$data["path"]))',
												'options' => array(
														'title' => 'Atualizar este arquivo.',
														'ajax' => array(
																'update' => '#svn-grid',
																'cache' => false,
																'type' => 'get',
																'url' => 'js:$(this).attr("href")',
																'success' => 'function(html){
																		$.fn.yiiGridView.update("svn-grid");
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
