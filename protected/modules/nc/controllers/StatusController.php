<?php

class StatusController extends Controller {

	public $titulo = 'Status';

	public function filters() {
	return array(
			'rights', 
			);
	}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Status'),
		));
	}

	public function actionCreate() {
		$model = new Status;


		if (isset($_POST['Status'])) {
			$model->attributes = $_POST['Status'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idstatus));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Status');


		if (isset($_POST['Status'])) {
			$model->attributes = $_POST['Status'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idstatus));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Status')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Status');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Status('search');
		$model->unsetAttributes();

		if (isset($_GET['Status']))
			$model->attributes = $_GET['Status'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}