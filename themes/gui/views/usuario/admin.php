<?php
$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar ', 'url'=>array('usuario/index')),
	array('label'=>'Inserir ', 'url'=>array('usuario/create')),
	array('label'=>'Editar coresolucoes ', 'url'=>array('usuario/update', 'id'=>1)),
	array('label'=>'Gerenciar ', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cad-usuario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciando Usuarios</h1>

<p>
Você pode usar símbolos de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) no inicio de cada termo para definir como será feita a busca
</p>

<?php echo CHtml::link('Pesquisa avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cad-usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idusuario',
		'idclifor',
		'ativo',
		'password',
		'login',
		'seed',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
