<?php $this->beginContent('//layouts/main'); ?>

<div id="menu">

<div class="span-5">
		

		<?php 
		//print_r($this->menu);
			/*
			$this->beginWidget('zii.widgets.CPortlet');*/ 
			$this->beginWidget('application.widgets.SMenu.SMenu', array(
				'items'=>$this->menu,
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
			
		</div><!-- content -->
		<div id="content">
			<?php echo $content; ?>
		</div>
	<div class="last">
		<div id="sidebar">
		
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>