<style>
.portlet-title{
	font-size: 30px !important;
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
<?php $this->beginContent('//layouts/main');?>
<div id="menu">
<div class="span-5">
		<?php
			$this->beginWidget('application.widgets.SMenu.SMenu', array(
				'items'       => Menu::geraMenu(),
				'htmlOptions' => array('class' => 'menuDropDown'),
			));
			$this->endWidget();
		?><!-- Top Menu -->
	</div>
</div>
	<div  id="body" class="shadow">
		<div id="contentHeader">
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title' => $this->titulo,
				));
				$this->widget('zii.widgets.CMenu', array(
					'items'       => $this->menu,
					'htmlOptions' => array('class' => 'operations'),
					'encodeLabel' => false,
				));
				$this->endWidget();
			?>
		</div><!-- content -->
		<div id="conteudo">
			<div id="c_container">
				<?php echo $content;?>
			</div>
		</div>
	</div>
<?php $this->endContent();?>