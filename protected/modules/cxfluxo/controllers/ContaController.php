<?php

	class ContaController extends Controller {

		public $titulo = 'Conta';

		public function filters()
		{
			return array('rights', );
		}

		public function actionView($id)
		{
			$this->render('view', array('model'=>$this->loadModel($id, 'Conta'), ));
		}

		public function actionCreate()
		{
			$model = new Conta;

			$this->performAjaxValidation($model, 'conta-form');

			if(isset($_POST['Conta'])) {
				$model->attributes = $_POST['Conta'];
				//$relatedData = array('empresas'=>isset($_POST['Conta']['empresas']) ? null : $_POST['Conta']['empresas'], );

				if($model->save() /*WithRelated($relatedData)*/) {
					if(Yii::app()->request->isAjaxRequest) {
						echo CJSON::encode(
						array(
							'status'=>'success',
							'div'=>'Conta Criada',
							'tag'=>CHtml::tag(
								'option',
								array(
									'value'=>$model->idconta
								), 
								CHtml::encode($model->descricao),
								true
							),
							'id'=>$model->idconta,
						)
					);
						Yii::app()->end();
					} else
						$this->redirect( array('view',
							'id'=>$model->idconta));
				}
			}
			if (Yii::app()->request->isAjaxRequest){
				echo CJSON::encode(array('status'=>'failure','div'=>$this->renderPartialWithHisOwnClientScript('_form',array('model'=>$model),true)));
				exit;
			} else
				$this->render('create', array('model'=>$model));
		}

		public function actionUpdate($id)
		{
			$model = $this->loadModel($id, 'Conta');

			$this->performAjaxValidation($model, 'conta-form');

			if(isset($_POST['Conta'])) {
				$model->attributes = $_POST['Conta'];
				//$relatedData = array('empresas'=>array_key_exists('empresas',$_POST['Conta'])? null : $_POST['Conta']['empresas'], );

				if($model->save() /*WithRelated($relatedData)*/) {
					$this->redirect( array('view',
						'id'=>$model->idconta));
				}
			}

			$this->render('update', array('model'=>$model, ));
		}

		public function actionDelete($id)
		{
			if(Yii::app()->request->isPostRequest) {
				$this->loadModel($id, 'Conta')->delete();

				if(!Yii::app()->request->isAjaxRequest)
					$this->redirect( array('admin'));
			} else
				throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
		}

		public function actionIndex()
		{
			$dataProvider = new CActiveDataProvider('Conta');
			$this->render('index', array('dataProvider'=>$dataProvider, ));
		}

		public function actionAdmin()
		{
			$model = new Conta('search');
			$model->unsetAttributes();

			if(isset($_GET['Conta']))
				$model->attributes = $_GET['Conta'];

			$this->render('admin', array('model'=>$model, ));
		}

	}
