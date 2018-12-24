<?php
$this->breadcrumbs=array(
	'Tblnotafiscal',
);

$this->menu=array(
	array('label'=>'[Listar]'),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Admin', 'url'=>array('admin')),
);
?>

<h1>Tblnotafiscal</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
