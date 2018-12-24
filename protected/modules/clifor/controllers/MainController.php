<?php

class MainController extends Controller {

	public $titulo = 'Cadastro de Clientes';
	
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
			'model' => $this->loadModel($id, 'CadClifor'),
		));
	}

	public function actionCreate() {
		$model = new CadClifor;


		if (isset($_POST['CadClifor'])) {
			$model->attributes = $_POST['CadClifor'];
			$relatedData = array(
				'users' => $_POST['CadClifor']['users'] === '' ? null : $_POST['CadClifor']['users'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->request->isAjaxRequest) {
					$detalhamento = $model->representingColumn();
					echo CJSON::encode(
							array(
									'status' => 'sucess',
									'div' => 'Inserido com sucesso!',
									'tag' => CHtml::tag('option',
											array(
													'value' => $model->idclifor											),
											CHtml::encode($model->$detalhamento),
											true),
									'id' => $model->idclifor,
							));
					Yii::app()->end();
				}else
					$this->redirect(array('view', 'id' => $model->idclifor));
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
		$model = $this->loadModel($id, 'CadClifor');


		if (isset($_POST['CadClifor'])) {
			$model->attributes = $_POST['CadClifor'];
			$relatedData = array(
				'users' => $_POST['CadClifor']['users'] === '' ? null : $_POST['CadClifor']['users'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->idclifor));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadClifor')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CadClifor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CadClifor('search');
		$model->unsetAttributes();

		if (isset($_GET['CadClifor']))
			$model->attributes = $_GET['CadClifor'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}