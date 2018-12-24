<?php
 	Yii :: import('zii.widgets.CMenu');
	class SMenu extends CMenu {
		
		/*
		 * Esse menu tem um formato especial de layout?
		 */
		public $customLayout = true;
		
		public $activeOpen = true;
		
		public $openclass = 'preopen';
		
		public $hide = false;
		
		/*
		 * Qual a classe devemos usar quando o menu tem submenus
		 */
		public $submenuItemCssClass;
		
		public $hassubmenuItemCssClass;
		
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
		
		protected static function getOperation($str){
			$s = $str;
				if ($s[0] == '/')
					$s = substr($str,1);
				return str_replace('/','.',$s);
		}
		
		protected function isItemVisible($item){
			//case is explicit told to hide, hide the item
			if (array_key_exists('hide',$item) && isset($item['hide']) && $item['hide']){
				return false;
			//check if user can see this menu
			} else if (array_key_exists('url',$item) && is_array($item['url'])){
				return (Yii::app()->user->checkAccess($this->getOperation($item['url'][0])))? true : false;
			//check if any of the submenus are avaiable to the user recursively
			} else if(isset($item['items']) && is_array($item['items'])){
				return $this->isSubItemVisible($item);
			//if all other fail, check if i have this information comming from another place
			} else  if (isset($item['visible'])){
				return $item['visible'];
			//PANIC! let him see the god'amm menu
			} else {
				return true;
			}
		}
		
		
		protected function isSubItemVisible($item){
				$ret = false;
				if (isset($item['items']) && is_array($item['items'])) {
					foreach ($item['items'] as $k=>$it) {
						$ret = ($this->isItemVisible($it) or $ret);
					}
					return $ret;
				} else {
					return false;
				}
		}
		
		protected function isItemActive($item,$route)
		{
			if(isset($item['url']) && is_array($item['url']))
			{
				$x = explode('/',trim($item['url'][0],'/'));
				
				$r = explode('/',$route);
				
				$t = false;
				
				if (!strcasecmp(trim($item['url'][0],'/'),$route)) {
					$t = true;
				} else { 
					switch (count($x)) {
						case 1:{
							if (!strcasecmp($x[0],$r[0])) $t = true;
							//echo $route;
						}break;
						case 2:{
							if ((!strcasecmp($x[0],$r[0])) and (!strcasecmp($x[1],$r[1]))) $t = true;
							//echo $route;
							//echo '2';
						}break;
						case 3:{
							if ((!strcasecmp($x[0],$r[0])) and (!strcasecmp($x[1],$r[1])) and (!strcasecmp($x[2],$r[2]))) $t = true;
							//echo '3';
						}break;
						default:{
							$t = false;
						}break;
					};
				}
				
				if ($t)
				{
					if(count($item['url'])>1)
					{
						foreach(array_splice($item['url'],1) as $name=>$value)
						{
							if(!isset($_GET[$name]) || $_GET[$name]!=$value) {
								return false;
							};
						}
					}
					return true;
				}
				return false;
			}
		}
		
		protected function isSubActive($item, $route)
		{
			$ret = false;
			if (!$this->isItemActive($item,$route)) {
				if (isset($item['items']) && is_array($item['items'])) {
					foreach ($item['items'] as $k=>$it) {
						$ret = ($this->isSubActive($it, $route) or $ret);
					}
					return $ret;
				} else {
					return false;
				}
			} else {
				return true;
			}
		}
		
		protected function normalizeItems($items,$route,&$active)
	{
		foreach($items as $i=>$item)
		{
			if(!$this->isItemVisible($item))
			{
				unset($items[$i]);
				continue;
			}
			if(!isset($item['label']))
				$item['label']='';
			if($this->encodeLabel)
				$items[$i]['label']=CHtml::encode($item['label']);
			$hasActiveChild=false;
			if(isset($item['items']))
			{
				$items[$i]['items']=$this->normalizeItems($item['items'],$route,$hasActiveChild);
				if(empty($items[$i]['items']) && $this->hideEmptyItems)
					unset($items[$i]['items']);
			}
			if(!isset($item['active']))
			{
				if($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item,$route))
					$active=$items[$i]['active']=true;
				else
					$items[$i]['active']=false;
			}
			else if($item['active'])
				$active=true;
		}
		return array_values($items);
	}
						
		protected function renderMenuRecursive($items)
		{
			$count=0;
			$n = count($items);
			foreach($items as $item)
			{
				//if(array_key_exists('url',$item)) $item['visible']=Yii::app()->user->checkAccess($item['url'][0]);
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
				if($this->isSubActive($item,$route) and ($this->activeOpen))
					$class[]=$this->openclass;
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
				//$this->isSubActive($item, $route);
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