<?php

class FluxoArquivoController extends Controller {

	public $titulo = 'FluxoArquivo';

	
	public function actionList($id){
		$model = new FluxoArquivo('lista');
		$this->renderPartialWithHisOwnClientScript('list',array('dp'=>$model->lista($id)),false,true);
	}
	/*
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'FluxoArquivo'),
		));
	}

	public function actionCreate() {
		$model = new FluxoArquivo;

		$this->performAjaxValidation($model, 'fluxo-arquivo-form');

		if (isset($_POST['FluxoArquivo'])) {
			$model->attributes = $_POST['FluxoArquivo'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idfluxo_arquivo));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'FluxoArquivo');

		$this->performAjaxValidation($model, 'fluxo-arquivo-form');

		if (isset($_POST['FluxoArquivo'])) {
			$model->attributes = $_POST['FluxoArquivo'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idfluxo_arquivo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'FluxoArquivo')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('FluxoArquivo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new FluxoArquivo('search');
		$model->unsetAttributes();

		if (isset($_GET['FluxoArquivo']))
			$model->attributes = $_GET['FluxoArquivo'];

		$this->render('admin', array(
			'model' => $model,
		));
	}*/

}