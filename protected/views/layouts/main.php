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
	<div id="myslidemenu" class="jqueryslidemenu"><div style='float:right; padding-top:5px; padding-right:5px; color:#FFF'>&copy;Smilch - Versão <?php echo CSvn::getVersao(); ?></div>
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
	<?php if(Yii::app()->user->hasFlash('success')):?>
	    <div id="message" class="flash-success">
	        <?php echo Yii::app()->user->getFlash('success'); ?>
	    </div>
	<?php endif; ?>
	<?php echo $content; ?>

<?php
$str = <<<'EOM'


function layout(){
                var $body = $('#body');
                var $content = $('#conteudo');
                var $contentHeader = $('#contentHeader');
				var $bcrumbs = $('.breadcrumbs');
                var $contentFooter = $('#contentFooter');
                var $message = $('#message');
                var $menu = $('#menu:visible');
                var $header = $('#header');
				
                $body.width($(window).width()-$menu.width()-7);
                $body.height($(window).height()-(3*$message.height())-(4*$bcrumbs.height())-$header.height()-50);
					
                $content.height($body.height()-$contentHeader.height()-$contentFooter.height());
                $content.width($(window).width()-$menu.width()-7);
            }
		
			setTimeout("$('#message').hide()",3000);
			
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