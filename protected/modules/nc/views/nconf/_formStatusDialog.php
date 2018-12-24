<style>
.container {
	width: auto !important;
}
</style>
<div class='view'>
	<?php $r = Nconf::getRelevanciaList();?>
	<b>[<?php echo $r[$model->relevancia]; ?>]</b><br>
	<b>Setor:</b><?= $model->setor->descricao ?><br>
	<b>De:</b><?= $model->autor->nome ?> <b>Para:</b><?= $model->alvo->nome ?><br /><br />
	<h3><?= $model->nc->descricao ?></h3>
</div>
<div class="form">

	<?php $form = $this->beginWidget('CActiveForm',
			array(
					'id' => 'status-form',
					'enableAjaxValidation' => true,
			));
	?>
	<div class="row">
		<?php echo CHtml::activeDropDownList($model, 'idstatus',
				Status::getList(), array(
						'id' => 'idstatus'
				)) ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton('Mudar Status',
				CHtml::normalizeUrl(
						array(
								'nconf/changestatus',
								'id' => $model->idnconf
						)
				),
				array(
						'success' => 'js: function(data) {
                        $.fn.yiiListView.update("list-status");
                        $("#nconf-grid").yiiGridView.update("nconf-grid");
                        $("#change-status").dialog("close");
                    }'
				), 
				array(
						'id' => 'c_conta_d'
				)
			);
		?>
	</div>
	<?php $this->endWidget(); ?>

</div>
<!-- form -->
<?php if (isset($model) and (is_object($model->nc))) : ?>
<?php $this->widget('zii.widgets.CListView',
			array(
					'id' => 'list-status',
					'dataProvider' => $dp,
					'itemView' => '/nconf/_viewstatus',
					'template' => '{summary}{pager}{sorter}{items}'
			));
?>
<?php endif; ?>
