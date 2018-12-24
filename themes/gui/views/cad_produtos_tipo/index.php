<?php
$this->breadcrumbs=array(
	'Cad Produtos Tipos',
);

$this->menu=array(
	array('label'=>'Create cad_produtos_tipo', 'url'=>array('create')),
	array('label'=>'Manage cad_produtos_tipo', 'url'=>array('admin')),
);
?>

<h1>Cad Produtos Tipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
