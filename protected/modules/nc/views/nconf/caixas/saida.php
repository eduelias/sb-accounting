<?php
$this->breadcrumbs = array(
	'Não Conformidade' => array(
		'index'
	), 'Caixa de Saída',
);

$list = $model->cxSaida();

$this->menu = array(
		array(
			'label' => 'Nova', 'url' => array(
				'create'
			)
		),
		array(
			'label' => 'NCs de Entrada', 'url' => array(
				'index'
			)
		),
		array(
			'label' => '[NCs de Saída]'
		),
		array(
			'label' => 'Públicas', 'url' => array(
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
		'name' => 'iduser_direcionado',
		'filter' => GxHtml::listDataEx(
				User::model()->findAllAttributes(null, true)),
		'value' => '$data->alvo->nome',
		'header' => 'Enviada para:',
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
