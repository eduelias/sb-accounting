<?php
$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	'Inserir',
);

$this->menu=array(
	array('label'=>'Listar ', 'url'=>array('usuario/index')),
	//array('label'=>'Atual: '.$model->login, 
	//'items'=>array(
	//	array('label'=>'Detalhes ', 'url'=>array('usuario/view','id'=>$model->idusuario)),
	//	array('label'=>'Editar ', 'url'=>array('usuario/update','id'=>$model->idusuario)),
	//)),
	array('label'=>'Editar coresolucoes ', 'url'=>array('usuario/update', 'id'=>1)),
	array('label'=>'Gerenciar ', 'url'=>array('admin')),
);
?>

<h1>Inserindo Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>