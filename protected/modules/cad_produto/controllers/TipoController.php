<?php

class TipoController extends Controller {

	public $titulo = 'Tipos de Produtos';

	public function filters()
	{
		return array('rights', );
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'CadProdutosTipo'),
		));
	}

	public function actionCreate() {
		$model = new CadProdutosTipo;
		
		$this->performAjaxValidation($model, 'cad-tipo-form');

		if (isset($_POST['CadProdutosTipo'])) {
			$model->attributes = $_POST['CadProdutosTipo'];

		if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
							array(
									'status' => 'sucess',
									'div' => 'Tipo Criado',
									'tag' => CHtml::tag('option',
											array(
													'value' => $model->idprodutos_tipo
											),
											CHtml::encode($model->descricao),
											true),
									'id' => $model->idprodutos_tipo,
							));
					Yii::app()->end();
				} else
					$this->redirect(array('view', 'id' => $model->idprodutos_tipo));
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
		$model = $this->loadModel($id, 'CadProdutosTipo');


		if (isset($_POST['CadProdutosTipo'])) {
			$model->attributes = $_POST['CadProdutosTipo'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idprodutos_tipo));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadProdutosTipo')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CadProdutosTipo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CadProdutosTipo('search');
		$model->unsetAttributes();

		if (isset($_GET['CadProdutosTipo']))
			$model->attributes = $_GET['CadProdutosTipo'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}