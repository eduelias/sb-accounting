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
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pedcabpedido-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'PED_ID_CAB_PED',
        /*array(
                'name'=>'SPED_ID_CPAG',
                'value'=>'GxHtml::valueEx($data->sPEDIDCPAG)',
                //'filter'=>GxHtml::listDataEx(PEDCONDPAGAMENTO::model()->findAllAttributes(null, true)),
                ),*/
        'ID_CLIENTE_CPED',
        'PED_NUM_PED_CLIENTE_CPED',
        'PED_DATA_PREV_ENTREGA_CPED',
        'PED_DATA_PEDIDO_CPED',
        /*
        'PED_STATUS_PEDIDO_CPED',
        'PED_TOTAL_PEDIDO_CPED',
        array(
                'name'=>'PED_ID_USUARIO_CAD_CPED',
                'value'=>'GxHtml::valueEx($data->pEDIDUSUARIOCADCPED)',
                'filter'=>GxHtml::listDataEx(SYSUSUARIO::model()->findAllAttributes(null, true)),
                ),
        array(
                'name'=>'PED_ID_USUARIO_CANC_CPED',
                'value'=>'GxHtml::valueEx($data->pEDIDUSUARIOCANCCPED)',
                'filter'=>GxHtml::listDataEx(SYSUSUARIO::model()->findAllAttributes(null, true)),
                ),
        'PED_DATA_CANC_CPED',
        array(
                'name'=>'IDNOTAFISCAL',
                'value'=>'GxHtml::valueEx($data->iDNOTAFISCAL)',
                'filter'=>GxHtml::listDataEx(TBLNOTAFISCAL::model()->findAllAttributes(null, true)),
                ),
        'PED_TOT_PESO_LIQ_CPED',
        'PED_TOT_PESO_BRUTO_CPED',
        'PED_TOT_QUANT_EMB_CPED',
        'PED_TIPO_PEDIDO_CPED',
        'PED_EMITE_NOTA_FISCAL_CPED',
        'PED_FAT_BARBACENA_CPED',
        'PED_SEM_ROTEIRO_CPED',
        'PED_ID_COORDENADOR_CPED',
        'PED_ID_PROMOTOR_CPED',
        */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
<?php
		/*phpinfo();
		$a = oci_connect('sis', 'sis','11.11.3.2:1521/sisdb', 'WE8MSWIN1252');
		$b = oci_parse($a,'select * from pess_categoria');
		oci_execute($b);
		
		echo "<table border='1'>\n";
		while ($row = oci_fetch_array($b, OCI_ASSOC+OCI_RETURN_NULLS)) {
			echo "<tr>\n";
			foreach ($row as $item) {
				echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
			}
			echo "</tr>\n";
		}
		echo "</table>\n";*/

?>