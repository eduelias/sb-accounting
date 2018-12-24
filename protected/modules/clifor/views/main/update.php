<?php
$this->breadcrumbs=array(
	'Cad Clifor'=>array('index'),
	$model->idclifor=>array('view','id'=>$model->idclifor),
	'Editar',
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Publicas', 'url'=>array('admin')),
	array('label'=>' | '), 
	array('label'=>' Ver  ', 'url'=>array('view', 'id'=>$model->idclifor)),
	array('label'=>' [Editar] '),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idclifor),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>

<h1><?php echo Yii::t('app', 'Update'); ?> CadClifor #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>