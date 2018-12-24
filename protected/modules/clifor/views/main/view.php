<?php
$this->breadcrumbs=array(
	'Cad Clifor'=>array('index'),
	$model->idclifor,
);
$this->menu = array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),	
	array('label'=>'Admin', 'url'=>array('admin')),
	array('label'=>' | '),
	array('label'=>' [Ver] '),
	array('label'=>' Editar ', 'url'=>array('update', 'id'=>$model->idclifor)),
	array('label'=>' Excluir ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idclifor),'confirm'=>'Tem certeza que deseja excluir este item?')),
)
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'idclifor',
array(
			'label' => 'CadCliforTipo',
			'type' => 'raw',
			'value' => $model->idtipo0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idtipo0)), array('cadCliforTipo/view', 'id' => GxActiveRecord::extractPkValue($model->idtipo0, true))) : null,
			),
'razao_social',
'nome_fantasia',
'doc',
'ie',
'data_cadastro',
'data_atualizacao',
'ativo:boolean',
	),
)); /*?>

<h2>Cad Clifor Enderecos</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->cadCliforEnderecos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadCliforEndereco/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Cad Clifor Telefones</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->cadCliforTelefones as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadCliforTelefone/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Users</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->users as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('user/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Cad Rel Produtos Preco Clifors</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->cadRelProdutosPrecoClifors as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('cadRelProdutosPrecoClifor/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Fluxos</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->fluxos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('fluxo/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Fluxo Fretes</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->fluxoFretes as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('fluxoFrete/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2>Fluxo Nfs</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->fluxoNfs as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('fluxoNf/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
*/?>