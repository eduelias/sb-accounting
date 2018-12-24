<?php
$this->breadcrumbs=array(
	'Formaspg'=>array('index'),
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
	$.fn.yiiGridView.update('formaspg-grid', {
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
	'id' => 'formaspg-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'idformaspg',
		'nome',
		array(
					'name' => 'detalha',
					'value' => '($data->detalha == 0) ? Yii::t(\'app\', \'Não\') : Yii::t(\'app\', \'Sim\')',
					'filter' => array('0' => Yii::t('app', 'Não'), '1' => Yii::t('app', 'Sim')),
					),
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>