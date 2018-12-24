<?php

class CadStatusController extends Controller {

	public $titulo = 'CadStatus';
	public function filters() {
		return array(
				'rights', 
				);
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'CadStatus'),
		));
	}

	public function actionCreate() {
		$model = new CadStatus;


		if (isset($_POST['CadStatus'])) {
			$model->attributes = $_POST['CadStatus'];
			$relatedData = array(
				'fluxoFormas' => $_POST['CadStatus']['fluxoFormas'] === '' ? null : $_POST['CadStatus']['fluxoFormas'],
				'fluxos' => $_POST['CadStatus']['fluxos'] === '' ? null : $_POST['CadStatus']['fluxos'],
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
													'value' => $model->idstatus											),
											CHtml::encode($model->$detalhamento),
											true),
									'id' => $model->idstatus,
							));
					Yii::app()->end();
				}else
					$this->redirect(array('view', 'id' => $model->idstatus));
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
		$model = $this->loadModel($id, 'CadStatus');


		if (isset($_POST['CadStatus'])) {
			$model->attributes = $_POST['CadStatus'];
			$relatedData = array(
				'fluxoFormas' => $_POST['CadStatus']['fluxoFormas'] === '' ? null : $_POST['CadStatus']['fluxoFormas'],
				'fluxos' => $_POST['CadStatus']['fluxos'] === '' ? null : $_POST['CadStatus']['fluxos'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->idstatus));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadStatus')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CadStatus');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CadStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['CadStatus']))
			$model->attributes = $_GET['CadStatus'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}