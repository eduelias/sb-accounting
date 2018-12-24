<?php

class ValidadeController extends Controller {

	public $titulo = 'Validade de Produtos';

	public function actionView($id) {

		$this->render('view',
				array(
					'model' => $this->loadModel($id, 'CadProdutosValidade'),
				));
	}

	public function filters() {

		return array(
			'rights',
		);
	}

	public function actionCreate() {

		$model = new CadProdutosValidade;

		if (isset($_POST['CadProdutosValidade'])) {
			$model->attributes = $_POST['CadProdutosValidade'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
							array(
									'status' => 'sucess',
									'div' => 'Validade Criada',
									'tag' => CHtml::tag('option',
											array(
													'value' => $model->idprodutos_validade
											), CHtml::encode($model->tipo),
											true),
									'id' => $model->idprodutos_validade,
							));
					Yii::app()->end();
				} else $this->redirect(
						array(
							'view', 'id' => $model->idprodutos_validade
						));
			}
		}

		if (Yii::app()->request->isAjaxRequest) {
			echo CJSON::encode(
					array(
							'status' => 'failure',
							'div' => $this->renderPartialWithHisOwnClientScript(
									'_form',
									array(
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

		$model = $this->loadModel($id, 'CadProdutosValidade');

		if (isset($_POST['CadProdutosValidade'])) {
			$model->attributes = $_POST['CadProdutosValidade'];

			if ($model->save()) {
				$this->redirect(
						array(
							'view', 'id' => $model->idprodutos_validade
						));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {

		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadProdutosValidade')->delete();

			if (!Yii::app()->request->isAjaxRequest) $this->redirect(
					array(
						'admin'
					));
		} else throw new CHttpException(400,
				Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {

		$dataProvider = new CActiveDataProvider('CadProdutosValidade');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {

		$model = new CadProdutosValidade('search');
		$model->unsetAttributes();

		if (isset($_GET['CadProdutosValidade'])) $model->attributes = $_GET['CadProdutosValidade'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
