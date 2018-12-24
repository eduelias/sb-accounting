<?php
$this->breadcrumbs=array(
	'Setor',
);

$this->menu=array(
	array('label'=>'Inserir Setor', 'url'=>array('create')),
	array('label'=>'Gerenciar Setor', 'url'=>array('admin')),
);
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
