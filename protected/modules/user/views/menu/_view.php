<style>
	div.view{
		margin:0px;
	}
</style>
<?php echo CHtml::link(CHtml::encode($data->idmenu), array('view', 'id'=>$data->idmenu)); ?> -
<?php echo CHtml::encode($data->label); ?>
<div class="view">
	<?php echo CHtml::encode($data->imagem); ?>

	<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>Menu::childAsDp($data),
	'template'=>'{items}',
	'emptyText'=>'Não há menus internos.',
	'itemView'=>'_view',
	)); ?>
</div>