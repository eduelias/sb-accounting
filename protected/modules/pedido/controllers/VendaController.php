<?php

class VendaController extends Controller {

	public $titulo = 'Fluxo';
	
	public function init() {
		
		if (method_exists($this->module,'registerScripts'))
			$this->module->registerScripts();
	}
	public function filters() {
		return array(
				'rights', 
				);
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Fluxo'),
		));
	}

	public function actionCreate() {
		$model = new Fluxo;


		if (isset($_POST['Fluxo'])) {
			$model->attributes = $_POST['Fluxo'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					$detalhamento = $model->representingColumn();
					echo CJSON::encode(
							array(
									'status' => 'sucess',
									'div' => 'Inserido com sucesso!',
									'tag' => CHtml::tag('option',
											array(
													'value' => $model->idfluxo											),
											CHtml::encode($model->$detalhamento),
											true),
									'id' => $model->idfluxo,
							));
					Yii::app()->end();
				}else
					$this->redirect(array('view', 'id' => $model->idfluxo));
			}
		}

		if (Yii::app()->request->isAjaxRequest) {
			echo CJSON::encode(
					array(
							'status' => 'failure',
							'div' => $this->renderPartialWithHisOwnClientScript(
									'_form', array(
										'model' => $model
									), true)
					));
			exit;
		} else {
			$this->render('create', array(
				'model' => $model
			));
		}
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Fluxo');


		if (isset($_POST['Fluxo'])) {
			$model->attributes = $_POST['Fluxo'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idfluxo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Fluxo')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Fluxo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Fluxo('search');
		$model->unsetAttributes();

		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}