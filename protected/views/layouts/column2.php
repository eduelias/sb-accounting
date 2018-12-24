<style>
.portlet-title{
	font-size: 20px !important;
	text-align: center !important;
	font-weight: bolder !important;
}
.portlet-content{
	margin:0 !important;
}

ul.operations li span {
	padding-left: 5px;
	font-weight: bold;
}

#content {
	padding-top: 0px !important;
}
</style>
<?php $this->beginContent('//layouts/main'); ?>
<?php

	$menu=array(
		//array('label'=>'Listar ', 'url'=>array('usuario/index')),
		array('label'=>'Não Conformidades',
		'items'=>array(
			array('label'=>'Nova ', 'url'=>array('/nconf/create')),
			array('label'=>'NCs de Entrada', 'url'=>array('/nconf/index')),
			array('label'=>'NCs de Saída', 'url'=>array('/nconf/indexmine')),
			array('label'=>'NCs Públicas', 'url'=>array('/nconf/admin')),
		)),
		//array('label'=>'Editar coresolucoes ', 'url'=>array('usuario/update', 'id'=>1)),
		//array('label'=>'Relatorios ', 'url'=>array('admin')),
		//array('label'=>'Site ', 'items'=>array(
			//array('label'=>'Inicio','url'=>array('/site')),
			//array('label'=>'Contato','url'=>array('site/contact'))
			//)
		//),
	);
?>
<div id="menu">

<div class="span-5">
		

		<?php 
		//print_r($this->menu);
			/*
			$this->beginWidget('zii.widgets.CPortlet');*/ 
			$this->beginWidget('application.widgets.SMenu.SMenu', array(
				'items'=>$menu,
				'htmlOptions'=>array('class'=>'menuDropDown'),
				
				
				//'firstItemCssClass'=>'title'
				//'linkOptions'=>array('class'=>'clickable')		
			));
			$this->endWidget();
		?>

		<!-- sidebar -->
	</div>
</div>

	<div  id="body" class="shadow">
		<div id="contentHeader">
			<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>$this->titulo,
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
				'encodeLabel'=>false,
			));
			$this->endWidget();
		?>
		</div><!-- content -->
		
		<div id='conteudo'>
			<div id="c_container">
					<?php echo $content; ?>
			</div>
		</div>
		<div class="last">
			
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>