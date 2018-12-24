<?php

	class FormaspgController extends Controller {

		public $titulo = 'Formas de Pagamento Padrão';
		
		public function filters() {
		return array(
				'rights', 
				);
		}

		public function actionView($id)
		{
			$this->render('view', array('model'=>$this->loadModel($id, 'Formaspg'), ));
		}

		public function actionCreate()
		{
			$model = new Formaspg;

			$this->performAjaxValidation($model, 'formaspg-form');

			if(isset($_POST['Formaspg'])) {
				$model->attributes = $_POST['Formaspg'];

				if($model->save()) {
					if(Yii::app()->request->isAjaxRequest){
						echo CJSON::encode(
							array(
								'status'=>'success',
								'div'=>'Forma de Pagamento Adicionada',
								'tag'=>CHtml::tag(
									'option',
									array(
										'value'=>$model->idformaspg
									), 
									CHtml::encode($model->nome),
									true
								),
								'id'=>$model->idformaspg,
							)
						);
						Yii::app()->end();
					} else
						$this->redirect( array('view',
							'id'=>$model->idformaspg));
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
			$model = $this->loadModel($id, 'Formaspg');

			$this->performAjaxValidation($model, 'formaspg-form');

			if(isset($_POST['Formaspg'])) {
				$model->attributes = $_POST['Formaspg'];

				if($model->save()) {
					$this->redirect( array('view',
						'id'=>$model->idformaspg));
				}
			}

			$this->render('update', array('model'=>$model, ));
		}

		public function actionDelete($id)
		{
			if(Yii::app()->request->isPostRequest) {
				$this->loadModel($id, 'Formaspg')->delete();

				if(!Yii::app()->request->isAjaxRequest)
					$this->redirect( array('admin'));
			} else
				throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
		}

		public function actionIndex()
		{
			$dataProvider = new CActiveDataProvider('Formaspg');
			$this->render('index', array('dataProvider'=>$dataProvider, ));
		}

		public function actionAdmin()
		{
			$model = new Formaspg('search');
			$model->unsetAttributes();

			if(isset($_GET['Formaspg']))
				$model->attributes = $_GET['Formaspg'];

			$this->render('admin', array('model'=>$model, ));
		}

	}
