<?php

class UserController extends Controller {

	public $titulo = 'User';
	
	public $layout = '//layouts/column2';

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'User'),
		));
	}
	
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations*/
            'rights'
		);
	}

	public function actionCreate() {
		$model = new User;

		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			$relatedData = array(
				'setor' => (!isset($_POST['User']['setor']) || $_POST['User']['setor'] === '')? null : $_POST['User']['setor'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->iduser));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'User');

		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			$relatedData = array(
				'nclidas' => $_POST['User']['nclidas'] === '' ? null : $_POST['User']['nclidas'],
				'setor' => $_POST['User']['setor'] === '' ? null : $_POST['User']['setor'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->iduser));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}
	
	public function actionEditself()
	{
		//$this->actionUpdate(Yii::app()->user->numid);
		$model = $this->loadModel(Yii::app()->user->numid,'User');
		 
		$model->password = '';
		
		if (isset($_POST['User']))
		{
			$model->atrributes=$_POST['User'];
			if ($model->save())
				$this->redirect(array('view','id'=>$model->iduser));
		}
		
		$this->render('selfedit',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'User')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('User');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new User('search');
		$model->unsetAttributes();

		if (isset($_GET['User']))
			$model->attributes = $_GET['User'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}