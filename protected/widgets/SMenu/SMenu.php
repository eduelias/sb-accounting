<?php
 	Yii :: import('zii.widgets.CMenu');
	class SMenu extends CMenu {
		
		/*
		 * Esse menu tem um formato especial de layout?
		 */
		public $customLayout = true;
		
		/*
		 * Qual a classe devemos usar quando o menu tem submenus
		 */
		public $submenuItemCssClass;
		
		public $normalTag = 'span';
		
		public $jsFile;
		
		public function init()
		{
			$file = dirname(__FILE__).DIRECTORY_SEPARATOR.'SMenu.js';
			
			$this->jsFile = Yii::app()->getAssetManager()->publish($file);
			
			$cs = Yii::app()->clientScript;
			
			$cs->registerScriptFile($this->jsFile);
					
			parent::init();
		}
		
		protected function isSubActive($item, $route)
		{
			$ret = false;
			if (!$this->isItemActive($item,$route)) {
				if (isset($item['items']) && is_array($item['items'])) {
					foreach ($item['items'] as $k=>$it) {
						$ret = $this->isSubActive($it, $route) || $ret;
					}
					return $ret;
				} else {
					return false;
				}
			} else {
				return true;
			}
		}
						
		protected function renderMenuRecursive($items)
		{
			$count=0;
			$n = count($items);
			foreach($items as $item)
			{
				$count++;
				$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
				$class=array();
				
				if(array_key_exists('items',$item) && $this->submenuItemCssClass!='') 
					$class[]=$this->hassubmenuItemCssClass;
				
				if(array_key_exists('items',$item)) {
					$class[]='clickable';
				}
				$route=$this->getController()->getRoute();
				if($item['active'] && $this->activeCssClass!='')
					$class[]=$this->activeCssClass;
				if($count===1 && $this->firstItemCssClass!='')
					$class[]=$this->firstItemCssClass;
				if($count===$n && $this->lastItemCssClass!='')
					$class[]=$this->lastItemCssClass;
				if($this->isSubActive($item,$route))
					$class[]='preopen';
				if($class!==array())
				{
					if(empty($options['class']))
						$options['class']=implode(' ',$class);
					else
						$options['class'].=' '.implode(' ',$class);
				}
				
				echo CHtml::openTag('li',$options);
				
				$opt = array('class'=>'title');
			
				echo CHtml::openTag('div',$opt);
 
				$menu=$this->renderMenuItem($item);
				
				if(isset($this->itemTemplate) || isset($item['template']))
				{
					$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
					echo strtr($template,array('{menu}'=>$menu));
				}
				else
					echo $menu;
					
				echo CHtml::closeTag('div')."\n";
				
				if(isset($item['items']) && count($item['items']))
				{
					$item['submenuOptions']['class']='inner';
					echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
					$this->renderMenuRecursive($item['items']);
					echo CHtml::closeTag('ul')."\n";
				}
				
				
				echo CHtml::closeTag('li')."\n";
			}
		}
		
	}

?>