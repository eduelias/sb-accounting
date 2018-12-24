<?php
$this->breadcrumbs = array(
	'Não Conformidade' => array(
		'index'
	), 'Caixa de Entrada',
);

$list = $model->cxEntrada();

$this->menu = array(
		array(
			'label' => 'Nova', 'url' => array(
				'create'
			)
		),
		array(
			'label' => '[NCs de Entrada]'
		),
		array(
			'label' => 'NCs de Saída', 'url' => array(
				'saida'
			)
		),
		array(
			'label' => 'Publicas', 'url' => array(
				'publicas'
			)
		),
		array(
			'label' => 'Histórico', 'url' => array(
				'historico'
			)
		),
);

$user = array(
		'name' => 'iduser_cad',
		'filter' => GxHtml::listDataEx(
				User::model()->findAllAttributes(null, true)),
		'value' => '$data->autor->nome',
		'header' => 'Autor',
		'htmlOptions' => array(
			'width' => '70px'
		),
);

?>

<?php echo $this->renderPartial('caixas/_grid',
		array(
				'model' => $model,
				'user' => $user,
				'list' => $list,
		));
?>
