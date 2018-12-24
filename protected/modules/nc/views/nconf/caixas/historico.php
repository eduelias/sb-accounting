<?php
$this->breadcrumbs = array(
	'Não Conformidade' => array('index'),
	'Histórico',
);

$list = $model->cxHistorico();

$this->menu = array(
	array(
		'label' => 'Nova',
		'url'   => array('create')
	),
	array(
		'label' => 'NCs de Entrada',
		'url'   => array('entrada')
	),
	array(
		'label' => 'NCs de Saída',
		'url'   => array('saida')
	),
	array(
		'label' => 'Públicas',
		'url'   => array('publicas')
	),
	array(
		'label' => 'Histórico',
		//'url'   => array('historico')
	),
);
$user = array(
	'name'        => 'iduser_cad',
	'filter'      => GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
	'value'       => '$data->autor->nome',
	'header'      => 'Autor',
	'htmlOptions' => array('width' => '70px'),
);
$user_alvo = array(
	'name'        => 'iduser_direcionado',
	'filter'      => GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
	'value'       => '$data->alvo->nome',
	'header'      => 'Enviada para',
	'htmlOptions' => array('width' => '70px'),
);

?>
<?php echo $this->renderPartial('caixas/_grid',
	array(
	'model'     => $model,
	'user'      => $user,
	'list'      => $list,
	'user_alvo' => $user_alvo
));
?>