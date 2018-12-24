<?php
$this->breadcrumbs=array(
	'Cad Produtos Validade'=>array('index'),
	$model->idprodutos_validade,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idprodutos_validade)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos_validade),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idprodutos_validade',
array(
			'label' => 'CadProdutosUnidade',
			'type' => 'raw',
			'value' => $model->unidade !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->unidade)), array('cadProdutosUnidade/view', 'id' => GxActiveRecord::extractPkValue($model->unidade, true))) : null,
			),
'tipo',
'valor',
'periodo',
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
?>