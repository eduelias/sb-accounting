<?php
$this->breadcrumbs=array(
	'Usuario',
);

$this->menu=array(
	array('label'=>'Listar ', 'url'=>array('usuario/index')),
	array('label'=>'Inserir ', 'url'=>array('usuario/create')),
	array('label'=>'Editar coresolucoes ', 'url'=>array('usuario/update', 'id'=>1)),
	array('label'=>'Gerenciar ', 'url'=>array('admin')),
);
?>

<h1>Usuarios</h1> 

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
