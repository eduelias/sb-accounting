<?php
$this->breadcrumbs=array(
	'User',
);

$this->menu=array(
	array('label'=>'Listando'),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>
<h1>Listando</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
