<?php
$this->breadcrumbs=array(
	'Cad Produtos'=>array('index'),
	$model->idprodutos,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idprodutos)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idprodutos),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idprodutos',
array(
			'label' => 'CadProdutosUnidade',
			'type' => 'raw',
			'value' => $model->unidade !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->unidade)), array('cadProdutosUnidade/view', 'id' => GxActiveRecord::extractPkValue($model->unidade, true))) : null,
			),
array(
			'label' => 'CadProdutosCategoria',
			'type' => 'raw',
			'value' => $model->categoria !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->categoria)), array('cadProdutosCategoria/view', 'id' => GxActiveRecord::extractPkValue($model->categoria, true))) : null,
			),
array(
			'label' => 'User',
			'type' => 'raw',
			'value' => $model->usuario !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->usuario)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->usuario, true))) : null,
			),
array(
			'label' => 'CadProdutosTipo',
			'type' => 'raw',
			'value' => $model->tipo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tipo)), array('cadProdutosTipo/view', 'id' => GxActiveRecord::extractPkValue($model->tipo, true))) : null,
			),
array(
			'label' => 'CadProdutosValidade',
			'type' => 'raw',
			'value' => $model->validade !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->validade)), array('cadProdutosValidade/view', 'id' => GxActiveRecord::extractPkValue($model->validade, true))) : null,
			),
'nomeprod',
'desc_max',
'desc_min',
'qtde_min',
'data_atualizacao',
'data_cadastro',
'ativo:boolean',
	),
)); ?>

<h2>Características</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->caracteristicas as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadProdutosCaracter/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Descrições</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->descricoes as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadProdutosDescricao/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Preços</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->precos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadProdutosPrecos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>