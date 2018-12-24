<?php
$this->breadcrumbs=array(
	'Cad Produtos Caracters',
);

$this->menu=array(
	array('label'=>'Create cad_produtos_caracter', 'url'=>array('create')),
	array('label'=>'Manage cad_produtos_caracter', 'url'=>array('admin')),
);
?>

<h1>Cad Produtos Caracters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
