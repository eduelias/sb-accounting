<style>
body{
 font-family: helvetica;
 font-size: 0.8em;
}

table{
font-size: 0.9em;
border-collapse: collapse;
width: 100%;
padding: 2px;
border:thin solid black;
}
</style>
<table border=1 cellpadding='2px'>
<tr>
		<th>Sacado</th>
		<th>Cedente</th>
		<th>Conta</th>
		<th>C. Custo</th>
		<th>NF</th>
		<th>Vencimento</th>
		<th>Descrição</th>
		<th>Valor Boleto</th>
		<th>Valor Pago</th>
	
</tr>
<?php $dp->pagination = false; ?>
<?php $this->widget('zii.widgets.CListView', array(
	'template'=>'{items}',
	'dataProvider'=>$dp,
	'itemView'=>'_print',
)); ?>
</table>