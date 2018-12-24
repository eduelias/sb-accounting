<style>
	.container{
		width: auto !important;
	}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'status-form',
	'enableAjaxValidation'=>true,
)); ?>
	<?php if (isset($model) and (is_object($model->nc))) : ?>
	<big><b><?=$model->nc->descricao;?></b></big><br>
	<small>Em: <?=$model->data_cadastro; ?></small>
	<?php endif; ?>
	<div class="row">
		<?php echo CHtml::activeDropDownList($model,'idstatus',Status::getList(),array('id'=>'idstatus'))?>
	</div>

	<div class="row buttons">
		 <?php echo CHtml::ajaxSubmitButton('Mudar Status',CHtml::normalizeUrl(array('nconf/changestatus','id'=>$model->idnconf)),array('success'=>'js: function(data) {
                        $("#nconf-grid").yiiGridView.update("nconf-grid");
                        $("#change-status").dialog("close");
                    }'),array('id'=>'c_conta_d')); ?>
    </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php if (isset($model) and (is_object($model->nc))) : ?>
<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dp,
			'itemView'=>'/nconf/_viewstatus',
		)); ?>
<?php endif; ?>