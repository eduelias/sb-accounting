<?php

class CliforModule extends CWebModule
{
	private $_assetsUrl = null;
	
	public $debug = true;
	
	public $layout = '//layouts/column2';
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'clifor.models.*',
			'clifor.components.*',
		));
	}
	
	public function getAssetsUrl()
	{
		if ($this->_assetsUrl === null) {
			$assetsPath = Yii::getPathOfAlias('application.modules.clifor.assets');
	
			// We need to republish the assets if debug mode is enabled.
			if ($this->debug === true)
			$this->_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath, false, -1, true);
			else
			$this->_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);
		}
	
		return $this->_assetsUrl;
	}
	
	public function registerScripts()
	{
		// Get the url to the module assets
		$assetsUrl = $this->getAssetsUrl();
	
		// Register the necessary scripts
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		//$cs->registerScriptFile($assetsUrl.'/js/rights.js');
		$cs->registerCssFile($assetsUrl.'/layout.css');
	
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
