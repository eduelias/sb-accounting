<?php
$this->breadcrumbs=array(
	'Cad Produtos Unidade'=>array('index'),
	$model->idunidade,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idunidade)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idunidade),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idunidade',
'simbolo',
'unidade',
'ativo:boolean',
	),
)); ?>

<h2>Cad Produtoses</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->produtos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadProdutos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Cad Produtos Validades</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->validades as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadProdutosValidade/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>