<?php
$this->breadcrumbs = array(
	'Fluxo' => array(
		'index'
	), 'Admin',
);

$this->menu = array(
		array(
			'label' => '[Baixa]'
		),
		array(
				'label' => 'Inserir Contas a Receber',
				'url' => array(
					'createReceber'
				)
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
					'tutorial', 'tutorial' => 'baixa'
				)
		)
);
?>
<?php echo $this->renderPartial('_grid',
		array(
				'model' => $model,
				'dp' => $model->baixa(),
				'buttom' => '{work}{baixa}{update}{delete}'
		));
?>