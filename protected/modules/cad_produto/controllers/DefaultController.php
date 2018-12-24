<?php

class DefaultController extends Controller
{
	public function filters() { return array( 'rights', ); }
	
	public function init()
	{
		$this->module->registerScripts();
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
}
