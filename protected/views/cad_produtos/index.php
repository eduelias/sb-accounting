<?php
$this->breadcrumbs=array(
	'Cad Produtoses',
);

$this->menu=array(
	array('label'=>'Create cad_produtos', 'url'=>array('create')),
	array('label'=>'Manage cad_produtos', 'url'=>array('admin')),
);
?>

<h1>Cad Produtoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
