<?php

class FluxoFormaController extends Controller {

	public $titulo = 'FluxoForma';
	public function filters() {
		return array(
				'rights', 
				);
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'FluxoForma'),
		));
	}

	public function actionCreate() {
		$model = new FluxoForma;


		if (isset($_POST['FluxoForma'])) {
			$model->attributes = $_POST['FluxoForma'];
			$relatedData = array(
				'status' => $_POST['FluxoForma']['status'] === '' ? null : $_POST['FluxoForma']['status'],
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
													'value' => $model->idfluxo_forma											),
											CHtml::encode($model->$detalhamento),
											true),
									'id' => $model->idfluxo_forma,
							));
					Yii::app()->end();
				}else
					$this->redirect(array('view', 'id' => $model->idfluxo_forma));
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
		$model = $this->loadModel($id, 'FluxoForma');


		if (isset($_POST['FluxoForma'])) {
			$model->attributes = $_POST['FluxoForma'];
			$relatedData = array(
				'status' => $_POST['FluxoForma']['status'] === '' ? null : $_POST['FluxoForma']['status'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->idfluxo_forma));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'FluxoForma')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('FluxoForma');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new FluxoForma('search');
		$model->unsetAttributes();

		if (isset($_GET['FluxoForma']))
			$model->attributes = $_GET['FluxoForma'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}