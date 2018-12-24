<div class='view'>
	<?php $r = Nconf::getRelevanciaList(); /*?>
	<b>[<?php echo $r[$model->nc->relevancia]; ?>]</b><br>
	<b>Setor:</b><?= $model->nc->setor->descricao ?><br>
	<b>De:</b><?= $model->nc->autor->nome ?> <b>Para:</b><?= $model->nc->alvo->nome ?><br /><br />
	<h3><?*/ echo $model->nc->nc->descricao ?></h3>
	<?php if (is_array($model->nc->comentarios)): ?>
	<div class="view">
		<?php echo $model->nc->comentarios[0]->comentario; ?>
	</div>
	<?php endif; ?>
</div>
<div class="form">
	<?php $form = $this->beginWidget('CActiveForm',
			array(
				'id' => 'comentario-form', 'enableAjaxValidation' => false,
			));
	?>
	<div class="row">
		<?php echo $form->labelEx($model, 'comentario'); ?>
		<?php echo $form->textArea($model, 'comentario',
				array(
					'rows' => 6, 'cols' => 50
				));
		?>
		<?php echo $form->error($model, 'comentario'); ?>
	</div>
	
	

	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton('Comentar',
				CHtml::normalizeUrl(
						array(
							'/nc/comentario/comenta', 'id' => $model->idnconf
						)),
				array(
						'success' => 'js: function(data) {
 					   $.fn.yiiListView.update("list-comentario");
	                   //$.fn.yiiGridView.update("nconf-grid");
                       $("#change-status").dialog("close");
                    	}'
				), array(
					'id' => 'c_conta_d'
				));
		?> 
	</div>
	<?php $this->endWidget(); ?>
</div>
<?php $this->widget('zii.widgets.CListView',
		array(
				'id' => 'list-comentario',
				'dataProvider' => $model->comentarios(),
				'itemView' => '/comentario/_viewcom',
				'template' => '{summary}{pager}{sorter}{items}',
				'ajaxUpdate' => 'listcomentario',
				'pager' => array(
					'pageSize' => 5
				)
		));
?>
