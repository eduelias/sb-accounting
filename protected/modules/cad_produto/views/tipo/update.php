<?php
$this->breadcrumbs=array(
	'Cad Produtos Tipo'=>array('index'),
	$model->idprodutos_tipo=>array('view','id'=>$model->idprodutos_tipo),
	'Editar',
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'Publicas', 'url'=>array('admin')),
	array('label'=>' | '), 
	array('label'=>' Ver  ', 'url'=>array('view', 'id'=>$model->idprodutos_tipo)),
	array('label'=>' [Editar] '),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos_tipo),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>

<h1><?php echo Yii::t('app', 'Update'); ?> CadProdutosTipo #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>