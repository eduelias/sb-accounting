<?php

class CadCliforTipoController extends Controller {

	public $titulo = 'CadCliforTipo';
	public function filters() {
		return array(
				'rights', 
				);
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'CadCliforTipo'),
		));
	}

	public function actionCreate() {
		$model = new CadCliforTipo;


		if (isset($_POST['CadCliforTipo'])) {
			$model->attributes = $_POST['CadCliforTipo'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					$detalhamento = $model->representingColumn();
					echo CJSON::encode(
							array(
									'status' => 'sucess',
									'div' => 'Inserido com sucesso!',
									'tag' => CHtml::tag('option',
											array(
													'value' => $model->idtipo											),
											CHtml::encode($model->$detalhamento),
											true),
									'id' => $model->idtipo,
							));
					Yii::app()->end();
				}else
					$this->redirect(array('view', 'id' => $model->idtipo));
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
		$model = $this->loadModel($id, 'CadCliforTipo');


		if (isset($_POST['CadCliforTipo'])) {
			$model->attributes = $_POST['CadCliforTipo'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idtipo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadCliforTipo')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CadCliforTipo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CadCliforTipo('search');
		$model->unsetAttributes();

		if (isset($_GET['CadCliforTipo']))
			$model->attributes = $_GET['CadCliforTipo'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}