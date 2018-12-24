<?php
$this->breadcrumbs=array(
	'Modelos de NC',
);

$this->menu=array(
	array('label'=>'Listando'),
	array('label'=>'Incluir', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Modelos de Não Conformidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
