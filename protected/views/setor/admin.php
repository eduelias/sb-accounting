<?php
$this->breadcrumbs=array(
	'Setor'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Setor', 'url'=>array('index')),
	array('label'=>'Inserir Setor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('setor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciando Setors</h1>

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
	'id'=>'setor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idsetor',
		'iduser_responsavel',
		'descricao',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
