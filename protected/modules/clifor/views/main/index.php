<?php
$this->breadcrumbs=array(
	'Cad Clifor',
);

$this->menu=array(
	array('label'=>'[Listar]'),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Admin', 'url'=>array('admin')),
);
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 