<?php

class CategoriaController extends Controller {

	public $titulo = 'Categoria de Produtos';

	public function filters() {

		return array(
			'rights',
		);
	}

	public function actionView($id) {

		$this->render('view',
				array(
					'model' => $this->loadModel($id, 'CadProdutosCategoria'),
				));
	}

	public function actionCreate() {

		$model = new CadProdutosCategoria;

		$this->performAjaxValidation($model, 'categoria-form');

		if (isset($_POST['CadProdutosCategoria'])) {

			$model->attributes = $_POST['CadProdutosCategoria'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
							array(
									'status' => 'sucess',
									'div' => 'Categoria Criada',
									'tag' => CHtml::tag('option',
											array(
													'value' => $model->idprodutos_categoria
											),
											CHtml::encode($model->descricao),
											true),
									'id' => $model->idprodutos_categoria,
							));
					Yii::app()->end();
				} else $this->redirect(
						array(
							'view', 'id' => $model->idprodutos_categoria
						));
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

		$model = $this->loadModel($id, 'CadProdutosCategoria');

		if (isset($_POST['CadProdutosCategoria'])) {
			$model->attributes = $_POST['CadProdutosCategoria'];

			if ($model->save()) {
				$this->redirect(
						array(
							'view', 'id' => $model->idprodutos_categoria
						));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {

		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadProdutosCategoria')->delete();

			if (!Yii::app()->request->isAjaxRequest) $this->redirect(
					array(
						'admin'
					));
		} else throw new CHttpException(400,
				Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {

		$dataProvider = new CActiveDataProvider('CadProdutosCategoria');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {

		$model = new CadProdutosCategoria('search');
		$model->unsetAttributes();

		if (isset($_GET['CadProdutosCategoria'])) $model->attributes = $_GET['CadProdutosCategoria'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
