<?php
$this->breadcrumbs=array(
	'Cad Produtos Categorias',
);

$this->menu=array(
	array('label'=>'Create cad_produtos_categoria', 'url'=>array('create')),
	array('label'=>'Manage cad_produtos_categoria', 'url'=>array('admin')),
);
?>

<h1>Cad Produtos Categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
