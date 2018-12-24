<?php
$this->breadcrumbs=array(
	'Cad Produtos'=>array('index'),
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
	$.fn.yiiGridView.update('cad-produtos-grid', {
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
	'id' => 'cad-produtos-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'idprodutos',
		array(
				'name'=>'idunidade',
				'value'=>'GxHtml::valueEx($data->unidade)',
				'filter'=>GxHtml::listDataEx(CadProdutosUnidade::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idcategoria',
				'value'=>'GxHtml::valueEx($data->categoria)',
				'filter'=>GxHtml::listDataEx(CadProdutosCategoria::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idusuario',
				'value'=>'GxHtml::valueEx($data->usuario)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idtipo',
				'value'=>'GxHtml::valueEx($data->tipo)',
				'filter'=>GxHtml::listDataEx(CadProdutosTipo::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idvalidade',
				'value'=>'GxHtml::valueEx($data->validade)',
				'filter'=>GxHtml::listDataEx(CadProdutosValidade::model()->findAllAttributes(null, true)),
				),
		/*
		'nomeprod',
		'desc_max',
		'desc_min',
		'qtde_min',
		'data_atualizacao',
		'data_cadastro',
		array(
					'name' => 'ativo',
					'value' => '($data->ativo == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>