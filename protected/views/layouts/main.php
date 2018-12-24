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
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/guimain.css" />
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
 
<body>

<div >
	<div id="myslidemenu" class="jqueryslidemenu">
		<?php $this->widget('application.widgets.SMenu.SMenu',array( 
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Minha Conta', 'hide'=>Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Trocar Senha','url'=>array('/user/default/editself')),
						array('label'=>'Informações','url'=>array('/user/default/view','id'=>Yii::app()->user->id))
					)
				),
				array('label'=>'Sistema', 'hide'=>Yii::app()->user->isGuest,
					'items'=> array(
						array('label'=>'Usuários','url'=>array('/user')),
						array('label'=>'Menus','url'=>array('/user/menu')),
						array('label'=>'Permissões', 'url'=>array('/rights')),
						array('label'=>'Atualizar','url'=>array('/svn')),
						array('label'=>'Contato','url'=>array('/site/contact')),
						//array('label'=>'Setores','url'=>array('/setor/index')),
						//array('label'=>'Status','url'=>array('/status/index'))
					)
				),
				array('label'=>'Login', 'url'=>array('/site/login'), 'hide'=>!Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'hide'=>Yii::app()->user->isGuest),
			),
			'htmlOptions'=>array('class'=>'toolbarTop'),
			'hassubmenuItemCssClass'=>'dropDown',	
			'activeOpen'=>false,		
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
$str = <<<'EOM'
function layout(){
                var $body = $('#body');
                var $content = $('#conteudo');
                var $contentHeader = $('#contentHeader');
				var $bcrumbs = $('.breadcrumbs');
                var $contentFooter = $('#contentFooter');
                var $menu = $('#menu:visible');
                var $header = $('#header');

                $body.width($(window).width()-$menu.width()-7);
                $body.height($(window).height()-(4*$bcrumbs.height())-$header.height()-12);
					
                $content.height($body.height()-$contentHeader.height()-$contentFooter.height());
                $content.width($(window).width()-$menu.width()-7);
            }

            function toggleDropDownMenu(){
                $('#menu').toggle();
                layout();
            }

            $(function(){
                layout();
                $(window).resize(function(){layout();});
            });
EOM;

Yii::app()->clientScript->registerScript('jq144',$str); ?>

</body>
</html>