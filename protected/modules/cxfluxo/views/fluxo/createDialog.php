<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', 
		array(
			'id'=>'baixa-fluxo',
			'options'=>array(
				'title'=>'Baixa',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>'auto',
				'height'=>'auto',
			)
		)
	  );
?>
<div id='baixa-fluxo'></div>
<?php echo $this->renderPartialWithHisOwnClientScript('_formDialog', array('model'=>$model),false,false); ?>
</div><!--Atenção, este div é pra cortar um erro 'div' q tem na chamada de scripts acima, ok? !-->
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>