<?php
$this->breadcrumbs=array(
	'Modelos de NC'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Incluir', 'url'=>array('create')),
	array('label'=>'Gerenciando'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tipo-nao-conformidade-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciando modelos de NC</h1>

<p>
Podem ser usados símbolos de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) no inicio de cada termo para definir como será feita a busca.
</p>

<?php echo CHtml::link('Pesquisa avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-nao-conformidade-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idnconf',
		'descricao',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
