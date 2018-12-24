<?php

class SetorController extends Controller {

	public $titulo = 'Setor';
	
	public $layout = '//layouts/column2';

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Setor'),
		));
	}

	public function actionCreate() {
		$model = new Setor;

		$this->performAjaxValidation($model, 'setor-form');

		if (isset($_POST['Setor'])) {
			$model->attributes = $_POST['Setor'];
			$relatedData = array(
				'users' => $_POST['Setor']['users'] === '' ? null : $_POST['Setor']['users'],
				'tipoNaoConformidades' => $_POST['Setor']['tipoNaoConformidades'] === '' ? null : $_POST['Setor']['tipoNaoConformidades'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idsetor));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Setor');

		$this->performAjaxValidation($model, 'setor-form');

		if (isset($_POST['Setor'])) {
			$model->attributes = $_POST['Setor'];
			$relatedData = array(
				'users' => $_POST['Setor']['users'] === '' ? null : $_POST['Setor']['users'],
				'tipoNaoConformidades' => $_POST['Setor']['tipoNaoConformidades'] === '' ? null : $_POST['Setor']['tipoNaoConformidades'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->idsetor));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Setor')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Setor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Setor('search');
		$model->unsetAttributes();

		if (isset($_GET['Setor']))
			$model->attributes = $_GET['Setor'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}