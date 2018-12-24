<?php
$this->breadcrumbs=array(
	'Cad Usuario',
);

$this->menu=array(
	array('label'=>'Inserir CadUsuario', 'url'=>array('create')),
	array('label'=>'Gerenciar CadUsuario', 'url'=>array('admin')),
);
?>

<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
