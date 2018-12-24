<?php class MTab extends CWidget{

	public $jsFile;
	public $cssFile;

	public function init(){
			$jsFile = dirname(__FILE__).DIRECTORY_SEPARATOR.'MTab.js';
			$cssFile = dirname(__FILE__).DIRECTORY_SEPARATOR.'MTab.css';
			
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			$this->cssFile= Yii::app()->getAssetManager()->publish($cssFile);
			
			$cs = Yii::app()->clientScript;			
			$cs->registerScriptFile($this->jsFile);
			$cs->registerCssFile($this->cssFile);
					
			parent::init();
	}

	public function create($arr){
		
	}

}