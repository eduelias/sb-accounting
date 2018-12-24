<?php

class EmpresaController extends Controller {

	public $titulo = 'Empresa';

	public function filters() {
	return array(
			'rights', 
			);
	}
	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Empresa'),
		));
	}

	public function actionCreate() {
		$model = new Empresa;

		$this->performAjaxValidation($model, 'empresa-form');

		if (isset($_POST['Empresa'])) {
			$model->attributes = $_POST['Empresa'];
			/*$relatedData = array(
				'contas' => $_POST['Empresa']['contas'] === '' ? null : $_POST['Empresa']['contas'],
				'users' => $_POST['Empresa']['users'] === '' ? null : $_POST['Empresa']['users'],
				);*/

			if ($model->save() /*WithRelated($relatedData)*/) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
						array(
							'status'=>'sucess',
							'div'=>'Empresa Criada',
							'tag'=>CHtml::tag(
								'option',
								array(
									'value'=>$model->idempresa
								), 
								CHtml::encode($model->nome),
								true
							),
							'id'=>$model->idempresa,
						)
					);
					Yii::app()->end();
				}
				else
					$this->redirect(array('view', 'id' => $model->idempresa));
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
		$model = $this->loadModel($id, 'Empresa');

		$this->performAjaxValidation($model, 'empresa-form');

		if (isset($_POST['Empresa'])) {
			$model->attributes = $_POST['Empresa'];
			/*$relatedData = array(
				'contas' => $_POST['Empresa']['contas'] === '' ? null : $_POST['Empresa']['contas'],
				'users' => $_POST['Empresa']['users'] === '' ? null : $_POST['Empresa']['users'],
				);
*/
			if ($model->save() /*WithRelated($relatedData)*/) {
				$this->redirect(array('view', 'id' => $model->idempresa));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Empresa')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Empresa');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Empresa('search');
		$model->unsetAttributes();

		if (isset($_GET['Empresa']))
			$model->attributes = $_GET['Empresa'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}