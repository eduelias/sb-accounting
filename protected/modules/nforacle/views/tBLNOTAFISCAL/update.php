<?php
$this->breadcrumbs=array(
	'Tblnotafiscal'=>array('index'),
	$model->IDNOTAFISCAL=>array('view','id'=>$model->IDNOTAFISCAL),
	'Editar',
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Publicas', 'url'=>array('admin')),
	array('label'=>' | '), 
	array('label'=>' Ver  ', 'url'=>array('view', 'id'=>$model->IDNOTAFISCAL)),
	array('label'=>' [Editar] '),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDNOTAFISCAL),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>

<h1>Editando TBLNOTAFISCAL <?php echo $model->IDNOTAFISCAL; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>