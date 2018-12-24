<?php
$this->breadcrumbs=array(
	'Fluxo Forma'=>array('index'),
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
	$.fn.yiiGridView.update('fluxo-forma-grid', {
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
	'id' => 'fluxo-forma-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'idfluxo_forma',
		array(
					'name' => 'entrada',
					'value' => '($data->entrada == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		'descricao',
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>