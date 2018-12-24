<?php

class CcustoController extends Controller {

	public $titulo = 'Centro de Custos';
	
public function filters() {
	return array(
			'rights', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Ccusto'),
		));
	}

	public function actionCreate() {
		$model = new Ccusto;

		$this->performAjaxValidation($model, 'ccusto-form');

		if (isset($_POST['Ccusto'])) {
			$model->attributes = $_POST['Ccusto'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
						array(
							'status'=>'sucess',
							'div'=>'Centro de Custo Adicionado!',
							'tag'=>CHtml::tag(
								'option',
								array(
									'value'=>$model->idccusto
								), 
								CHtml::encode($model->descricao),
								true
							),
							'id'=>$model->idccusto,
						)
					);
					Yii::app()->end();
				}
				else
					$this->redirect(array('view', 'id' => $model->idccusto));
			}
		}
		if (Yii::app()->request->isAjaxRequest){
			echo CJSON::encode(array('status'=>'failure','div'=>$this->renderPartialWithHisOwnClientScript('_form',array('model'=>$model),true)));
			exit;
		} else
			$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Ccusto');

		$this->performAjaxValidation($model, 'ccusto-form');

		if (isset($_POST['Ccusto'])) {
			$model->attributes = $_POST['Ccusto'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idccusto));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Ccusto')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Ccusto');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Ccusto('search');
		$model->unsetAttributes();

		if (isset($_GET['Ccusto']))
			$model->attributes = $_GET['Ccusto'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}