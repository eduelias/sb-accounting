<?php

class MainController extends Controller {

	public $titulo = 'Cadastro de Produtos';

	public function init() {

		$this->module->registerScripts();
	}

	public function filters() {

		return array(
			'rights',
		);
	}

	public function actionView($id) {

		$this->render('view',
				array(
					'model' => $this->loadModel($id, 'CadProdutos'),
				));
	}

	public function actionCreate() {

		$model = new CadProdutos;

		$preco = new CadProdutosPrecos;

		if (isset($_POST['CadProdutos'])) {
			$model->attributes = $_POST['CadProdutos'];

			if ($model->save()
					&& $_POST['CadProdutosPrecos']['valor_tabela'] !== '') {

				$preco->attributes = $_POST['CadProdutosPrecos'];

				$preco->idprodutos = $model->idprodutos;

				if ($preco->save()) if (Yii::app()->request->isAjaxRequest) Yii::app()->end();
				else $this->redirect(
						array(
							'view', 'id' => $model->idprodutos
						));
			}
		}

		$this->render('create', array(
			'model' => $model
		));
	}

	public function actionUpdate($id) {

		$model = $this->loadModel($id, 'CadProdutos');

		$preco = new CadProdutosPrecos;

		if (isset($_POST['CadProdutos'])) {
			$model->attributes = $_POST['CadProdutos'];

			if ($model->save()
					&& $_POST['CadProdutosPrecos']['valor_tabela'] !== '') {

				$preco->attributes = $_POST['CadProdutosPrecos'];

				$preco->idprodutos = $model->idprodutos;

				if ($preco->save()) if (Yii::app()->request->isAjaxRequest) Yii::app()->end();
				else $this->redirect(
						array(
							'view', 'id' => $model->idprodutos
						));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {

		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadProdutos')->delete();

			if (!Yii::app()->request->isAjaxRequest) $this->redirect(
					array(
						'admin'
					));
		} else throw new CHttpException(400,
				Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {

		$model = new CadProdutos('index');
		$model->unsetAttributes();

		if (isset($_GET['CadProdutos'])) $model->attributes = $_GET['CadProdutos'];

		$this->render('index', array(
			'model' => $model,
		));
		
		/*$dataProvider = new CActiveDataProvider('CadProdutos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));*/
	}

	public function actionAdmin() {

		$model = new CadProdutos('search');
		$model->unsetAttributes();

		if (isset($_GET['CadProdutos'])) $model->attributes = $_GET['CadProdutos'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
