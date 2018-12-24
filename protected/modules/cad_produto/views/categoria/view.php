<?php
$this->breadcrumbs=array(
	'Cad Produtos Categoria'=>array('index'),
	$model->idprodutos_categoria,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idprodutos_categoria)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos_categoria),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idprodutos_categoria',
array(
			'label' => 'CadProdutosCategoria',
			'type' => 'raw',
			'value' => $model->categoria_pai !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->categoria_pai)), array('cadProdutosCategoria/view', 'id' => GxActiveRecord::extractPkValue($model->categoria_pai, true))) : null,
			),
'descricao',
'fator_corr',
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
?><h2>Cad Produtos Categorias</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->categorias_filhas as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadProdutosCategoria/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>