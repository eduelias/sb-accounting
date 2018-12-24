<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->idusuario=>array('view','id'=>$model->idusuario),
	'Editar',
);

/*$this->menu=array('Usuario'=>array(
		array('nome'=>'Listar', 'link'=>'?r=usuario/index'),
		array('nome'=>'Incluir', 'link'=>'?r=usuario/create'),
		//array('nome'=>'Editar', 'link'=>'?r=usuario/update&id='.$model->idusuario),
		array('nome'=>'Gerenciar', 'link'=>'?r=usuario/admin'),
	)
);*/

$this->menu=array(
	array('label'=>'Listar ', 'url'=>array('usuario/index')),
	array('label'=>'Atual: '.$model->login, 
	'items'=>array(
		array('label'=>'Detalhes ', 'url'=>array('usuario/view','id'=>$model->idusuario)),
		array('label'=>'Editar ', 'url'=>array('usuario/update','id'=>$model->idusuario)),
	)),
	array('label'=>'Editar coresolucoes ', 'url'=>array('usuario/update', 'id'=>1)),
	array('label'=>'Gerenciar ', 'url'=>array('admin')),
);
?>

<h1>Editando Usuario <?php echo $model->login; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>