<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" />
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
 
<body>

<div >
	<div id="myslidemenu" class="jqueryslidemenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Minha Conta', 'visible'=>!Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Trocar Senha','url'=>array('/usuario/update','id'=>Yii::app()->user->getId())),
						array('label'=>'Gerenciar','url'=>array('/usuario/admin')))
				),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->id.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
			'htmlOptions'=>array('class'=>'toolbarTop','hassubmenuItemCssClass'=>'dropDown')			
		)); ?>
	</div><!-- mainmenu --> 
	
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


</div><!-- page -->
<?php
$str = <<<'EOT'
function layout(){
                var $body = $('#body');
                var $content = $('#content');
                var $contentHeader = $('#contentHeader');
				var $bcrumbs = $('.breadcrumbs');
                var $contentFooter = $('#contentFooter');
                var $menu = $('#menu:visible');
                var $header = $('#header');

                $body.width($(window).width()-$menu.width()-7);
                $body.height($(window).height()-(4*$bcrumbs.height())-$header.height()-12);

                $content.height($body.height()-$contentHeader.height()-$contentFooter.height());
            }

            function toggleDropDownMenu(){
                $('#menu').toggle();
                layout();
            }

            $(function(){
                layout();
                $(window).resize(function(){layout();});
            });
EOT;

Yii::app()->clientScript->registerScript('jq144',$str); ?>

</body>
</html>