<?php

class FluxoController extends Controller {

	public $titulo = 'Fluxo';

	public function init()
	{
		$this->module->registerScripts();
	}

	public function filters()
	{
		return array('rights', );
	}

	public function actionView($id)
	{
		$this->render('view', array('model' => $this->loadModel($id, 'Fluxo'), ));
	}

	public function actionCreatePagar()
	{
		$this->actionCreate('pagar');
	}

	public function actionCreateReceber()
	{
		$this->actionCreate('receber');
	}
	
	public function actionHistorico()
	{
		$model = new Fluxo('search');
		
		$model->unsetAttributes();
		//$model->data_pagamento = null;
		
		if (isset($_GET['Fluxo']))
		$model->attributes = $_GET['Fluxo'];
		
		$this->render('historico', array('model' => $model, ));
	}
	
	public function actionTutorial($tutorial = 'index'){
		switch ($tutorial){
			case 'index':{
				$this->render('tutoriais/index');
			};break;
			case 'car_ins':{
				$this->render('tutoriais/car_ins');
			};break;
			case 'cap_ins':{
				$this->render('tutoriais/cap_ins');
			};break;
			case 'baixa':{
				$this->render('tutoriais/baixa');
			}
			default:{
				$this->render('index');
			};
		}
	}

	public function actionCreate($tipo = 'pagar')
	{
		$this->titulo = ($tipo == 'pagar') ? "Contas a Pagar" : "Contas a Receber";

		$c_grupo = new CDbCriteria;

		$c_fora = new CDbCriteria;

		$c_grupo->condition = 'dogrupo';

		$c_fora->condition = 'not dogrupo';

		$model = new Fluxo('Create');

		$model->iduser = Yii::app()->user->id;
		
		$model->file = CUploadedFile::getInstance($model, 'file');

		$this->performAjaxValidation($model, 'fluxo-form');

		if (isset($_POST['Fluxo'])) {

			$model->attributes = $_POST['Fluxo'];
			
			if ($model->validate()) {
				
				$model->file = CUploadedFile::getInstance($model, 'file');
				
				$ax = explode('.', $model->file);
				
				$filename = uniqid().'.'.$ax[count($ax)-1];

				$filepath = Yii::app()->basePath.'/../images/fluxo/'.$filename;
				
				//$model->file = uniqid().'_'.$model->file;

				$model->file->saveAs($filepath);

				$model->filename = '/images/fluxo/'.$filename;
				
				$a = new Arquivo;

				$a->iduser = Yii::app()->user->id;

				$a->path = Yii::app()->basePath.'/../images/';

				$a->filename = $filename;
				
				$a->real_name = CHtml::encode($model->file);

				$a->ext = $ax[count($ax)-1];

				$a->save(false);

				$fa = new FluxoArquivo;

				$fa->idarquivo = $a->idarquivo;

				$fa->descricao = 'Documento submetido na inserção.';

				if ($model->save()) {
					$fa->idfluxo = $model->idfluxo;
					$fa->save(false);
					if (Yii::app()->request->isAjaxRequest)
						Yii::app()->end();
					else {
						$this->redirect(array('view',
							'id' => $model->idfluxo));
					}
				}
			}
		}

		$this->render('create', array('model'   => $model,
			'cap'     => (($tipo == 'pagar') ? true : false),
			'origem'  => ($tipo == 'pagar') ? 'dogrupo' : 'true',
			'destino' => ($tipo == 'pagar') ? 'true' : 'dogrupo'));
	}

	public function actionBaixa($id)
	{

		$model = $this->loadModel($id, 'Fluxo');

		$model->setScenario('baixa');

		$this->performAjaxValidation($model, 'baixa-form');

		if (isset($_POST['Fluxo'])) {

			$model->attributes = $_POST['Fluxo'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(array('status' => 'success',
						'div'    => 'Baixa Efetuada Com Sucesso!',
						'id'     => $model->idfluxo,
						'url'    => Yii::app()->createUrl("cxfluxo/fluxo/baixa", array("id" => $model->idfluxo))));
					Yii::app()->end();
				} else
					$this->redirect(array('view',
						'id' => $model->idfluxo));
			}
		}

		if (Yii::app()->request->isAjaxRequest) {
			echo CJSON::encode(array('status' => 'failure',
				'div'    => $this->renderPartialWithHisOwnClientScript('_formBaixaDialog', array('model' => $model), true)));
			exit;
		} else {
			$this->render('create', array('model' => $model));
		}
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id, 'Fluxo');

		$cap = $model->idempresaOrigem->dogrupo;

		$this->performAjaxValidation($model, 'fluxo-form');

		if (isset($_POST['Fluxo'])) {
			$model->attributes = $_POST['Fluxo'];

			if ($model->save()) {
				$this->redirect(array('view',
					'id' => $model->idfluxo));
			}
		}
		$origem = ($cap) ? 'dogrupo' : 'true';
		$destino = ($cap) ? 'true' : 'dogrupo';
		$this->render('update', array('model'   => $model,
			'origem'  => $origem,
			'destino' => $destino));
	}

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Fluxo')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex()
	{
		$model = new Fluxo('search');

		$model->unsetAttributes();
		$model->data_pagamento = null;

		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];

		$this->render('index', array('model' => $model, ));
	}

	public function actionAdmin()
	{
		$model = new Fluxo('search');
		$model->unsetAttributes();

		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];

		$this->render('admin', array('model' => $model, ));
	}

}
