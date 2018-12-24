<?php
$this->breadcrumbs = array(
	'Fluxo' => array(
		'index'
	), 'Inserir',
);
if ($cap) {
	$this->menu = array(
			array(
				'label' => 'Baixa', 'url' => array(
					'index'
				)
			),
			array(
					'label' => 'Inserir Contas a Receber',
					'url' => array(
						'createReceber'
					)
			),
			array(
				'label' => '[Inserindo: Contas a Pagar]'
			),
			array(
				'label' => 'Historico', 'url' => array(
					'historico'
				)
			),
			array(
					'label' => 'Ajuda sobre esta página',
					'url' => array(
						'tutorial', 'tutorial' => 'cap_ins'
					)
			)
	//array('label'=>'Admin', 'url'=>array('admin')),
	);
} else {
	$this->menu = array(
			array(
				'label' => 'Baixa', 'url' => array(
					'index'
				)
			),
			array(
				'label' => '[Inserindo: Contas a Receber]'
			),
			array(
					'label' => 'Inserir Contas a Pagar',
					'url' => array(
						'createPagar'
					)
			),
			array(
				'label' => 'Historico', 'url' => array(
					'historico'
				)
			),
			array(
					'label' => 'Ajuda sobre esta página',
					'url' => array(
						'tutorial', 'tutorial' => 'car_ins'
					)
			)
	);
	//array('label'=>'Admin', 'url'=>array('admin')),
}
?>
<?php
$this->renderPartial('_form',
		array(
				'model' => $model,
				'origem' => $origem,
				'destino' => $destino,
				'buttons' => 'create'
		));
?>
