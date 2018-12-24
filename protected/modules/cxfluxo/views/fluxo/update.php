<?php
$this->breadcrumbs=array(
	'Fluxo'=>array('index'),
	$model->idfluxo=>array('view','id'=>$model->idfluxo),
	'Editar',
);
$this->menu = array(
	array('label'=>'Baixa', 'url'=>array('index')),
	array('label'=>'Inserir Contas a Receber', 'url'=>array('createReceber')),
	array('label'=>'Inserir Contas a Pagar', 'url'=>array('createPagar')),
	array('label'=>' | '), 
	array('label'=>' Ver  ', 'url'=>array('view', 'id'=>$model->idfluxo)),
	array('label'=>' [Editar] '),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idfluxo),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>

<h1><?php echo Yii::t('app', 'Alterando'); ?> Fluxo #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model, 
		'origem'=> $origem,
		'destino'=> $destino));
?>