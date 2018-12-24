<h1><?=$this->titulo?></h1>
<?php
/*echo 'ELES';
 $a = oci_connect('sis', 'sis','192.168.2.209:1521/XE');
 $b = oci_parse($a,'select * from tbltipofrete');
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
<?php 
echo $this->renderPartial('_grid',
	array(
	'model'        => $model,
	'dp'           => $model->capbaixa(),
	'buttom'       => '{work}{baixa}{update}{delete}',
	'filtroOrigem' => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
																				null, true,
																				array(
																					'order' => 'nome asc',
																					'condition' => 'dogrupo'
																				)
		 																	)
										),
	'filtroDestino' => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
																				null, true,
																				array(
																					'order' => 'nome asc'
																				)
		 																	)
										),
	)
);
?>