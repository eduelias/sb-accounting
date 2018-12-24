<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->actionAdmin();
	}
	
	public function actionAdmin($path = __DIR__){
		
		$model = new CSvn;
		
		$model->unsetAttributes();
		
		if (isset($_GET['CSvn'])){
			$model->setAttributes($_GET['CSvn']);
		}
		
		$this->render('index',array('model'=>$model));
		
	}
	
	public function actionUpdate($path){
		
		CSvn::update($path);
		//echo $path;
		
		Yii::app()->end();
		
	}
}