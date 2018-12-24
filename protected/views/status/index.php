<?php
$this->breadcrumbs=array(
	'Status',
);

$this->menu=array(
	array('label'=>'Listando'),
	array('label'=>'Incluir', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
