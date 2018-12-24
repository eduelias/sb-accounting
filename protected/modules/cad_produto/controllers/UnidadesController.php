<?php

class UnidadesController extends Controller {

	public $titulo = 'Unidades de Medida';

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'CadProdutosUnidade'),
		));
	}
	public function filters()
	{
		return array('rights', );
	}

	public function actionCreate() {
		$model = new CadProdutosUnidade;
		
		$this->performAjaxValidation($model, 'unidades-form');


		if (isset($_POST['CadProdutosUnidade'])) {
			$model->attributes = $_POST['CadProdutosUnidade'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
						array(
							'status'=>'sucess',
							'div'=>'Unidade Adicionada',
							'tag'=>CHtml::tag(
								'option',
								array(
									'value'=>$model->idunidade
								), 
								CHtml::encode($model->simbolo),
								true
							),
							'id'=>$model->idunidade,
						)
					);
					Yii::app()->end();
				}
				else
					$this->redirect(array('view', 'id' => $model->idunidade));
			}
		}

		if (Yii::app()->request->isAjaxRequest){
			echo CJSON::encode(array('status'=>'failure','div'=>$this->renderPartialWithHisOwnClientScript('_form',array('model'=>$model),true)));
			exit;
		} else {
			$this->render('create', array( 'model' => $model));
		}
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'CadProdutosUnidade');


		if (isset($_POST['CadProdutosUnidade'])) {
			$model->attributes = $_POST['CadProdutosUnidade'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idunidade));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'CadProdutosUnidade')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CadProdutosUnidade');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CadProdutosUnidade('search');
		$model->unsetAttributes();

		if (isset($_GET['CadProdutosUnidade']))
			$model->attributes = $_GET['CadProdutosUnidade'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}