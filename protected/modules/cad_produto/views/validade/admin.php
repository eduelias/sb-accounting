<?php
$this->breadcrumbs=array(
	'Cad Produtos Validade'=>array('index'),
	'Admin',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Inserir', 'url'=>array('create')),
	array('label'=>'[Admin]')
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cad-produtos-validade-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<p>
Podem ser usados símbolos de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) no inicio de cada termo para definir como será feita a busca.
</p>

<?php echo GxHtml::link(Yii::t('yii', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'cad-produtos-validade-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'idprodutos_validade',
		array(
				'name'=>'idunidade',
				'value'=>'GxHtml::valueEx($data->unidade)',
				'filter'=>GxHtml::listDataEx(CadProdutosUnidade::model()->findAllAttributes(null, true)),
				),
		'tipo',
		'valor',
		'periodo',
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>