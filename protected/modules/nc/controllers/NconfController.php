<?php

class NconfController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	public $titulo = 'Não Conformidades';

	public function init()
	{
		$this->module->registerScripts();
	}

	public $tempo_relevancia = array(
		'0' => '960000',
		'1' => '480000',
		'2' => '120000',
		'3' => '080000',
		'4' => '020000'
	);
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			/*'accessControl', // perform access control for CRUD operations*/
			'rights'
		);
	}

	public function allowedActions()
	{
		return 'index';
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow all users to perform 'index' and 'view' actions
			'actions' => array('index', 'view'),
				'users'   => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions' => array('create', 'update'),
				'users'   => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions' => array('admin', 'delete'),
				'users'   => array('admin'),
			),
			array('deny', // deny all users
			'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Nconf'),
		));
	}

	public function actionReturn($id)
	{
		$nc = Nconf::model()->findByPk($id);
		if ($nc->iduser_cad == Yii::app()->user->numid) {
			$this->actionSaida();
		} else {
			$this->actionEntrada();
		}
	}

	public function actionAutoCompleteLookup()
	{
		if (Yii::app()->request->isAjaxRequest && isset($_GET['q'])) {
			$desc = $_GET['q'];
			// this was set with the "max" attribute of the CAutoComplete widget
			$limit = min($_GET['limit'], 50);
			$criteria = new CDbCriteria;
			$criteria->condition = "descricao LIKE :sterm";
			$criteria->params = array(":sterm" => "%$desc%");
			$criteria->limit = $limit;
			$tnca = TipoNaoConformidade::model()->findAll($criteria);
			$returnVal = "";
			foreach ($tnca as $mnca) {
				$returnVal .= $mnca->getAttribute('descricao').'|'.$mnca->getAttribute('idnconf')."\n";
			}
			//$returnVal .= $desc."|0\n";

			echo $returnVal;
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Nconf;

		$comentario = new Comentario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->iduser_cad = Yii::app()->user->numid;

		$model->idnconf_tipo = 0;

		if (isset($_POST['Nconf'])) {
			$model->attributes = $_POST['Nconf'];

			if ($model->save() && $_POST['Comentario']['comentario'] != '') {
				$comentario->attributes = $_POST['Comentario'];
				$comentario->idnconf = $model->idnconf;
				$comentario->publico = ($model->publica) ? 'S' : 'N';

				if ($comentario->save()) {
					$this->redirect(array('saida'));
				} else
					$this->addError('comentario', 'Erro ao inserir comentario');
			} else {
				if ($model->save()) {
					$this->redirect(array('saida'));
				}
			}

		}

		$this->render('create', array(
			'model'      => $model,
			'comentario' => $comentario
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{

		if (User::isGerente())
			$model = $this->loadModel($id, 'Nconf');
		else {
			$c = new CDbCriteria;
			$c->addCondition(array(
				'iduser_direcionado = '.Yii::app()->user->numid,
				'iduser_cad = '.Yii::app()->user->numid
			), 'OR');
			$c->addCondition('idnconf = '.$id,'AND');
			$model = Nconf::model()->find($c);

			if ($model === null)
				throw new CHttpException(404, 'NC não pode ser editada por vc.');
		}

		$tncf = TipoNaoConformidade::model()->findByPk($model->idnconf_tipo);

		$model->idnconf_string = $tncf->descricao;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Nconf'])) {
			$model->attributes = $_POST['Nconf'];
			if ($model->save())
				$this->redirect(array('saida'));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionChangeStatus($id = 1)
	{
		$uid = Yii::app()->user->id;

		$model = $this->loadModel($id, 'Nconf');

		if (($uid = $model->iduser_cad) or ($uid = $model->iduser_direcionado) or (User::isGerente())) {
			if (isset($_POST['Nconf']['idstatus'])) {
				$model->changeStatus($_POST['Nconf']['idstatus']);
				Yii::app()->end();
			}

			$c = new CDbCriteria;

			$c->condition = 'idnconf = '.$model->idnconf;

			$c->order = 'data DESC';

			$dp = new CActiveDataProvider('RelStatusNconf', array('criteria' => $c, 'pagination'=>array('pageSize'=>7)));

			$this->renderPartialWithHisOwnClientScript('_formStatusDialog', array('model' => $model, 'dp' => $dp), false, true);
		}

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id, 'Nconf')->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else
			throw new CHttpException(400, 'Link Inv&aacute;lido.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionEntrada();
	}

	public function actionEntrada()
	{
		$model = new Nconf('entrada');
		$model->unsetAttributes(); // clear any default values
		
		if (isset($_GET['Nconf']))
			$model->attributes = $_GET['Nconf'];
		
		$this->render('caixas/entrada', array(
					'model' => $model,
		));
	}
	
	public function actionSaida()
	{
		$model = new Nconf('saida');
		$model->unsetAttributes(); // clear any default values
		
		if (isset($_GET['Nconf'])) {
			$model->attributes = $_GET['Nconf'];
			$model->data_cadastro = $_GET['Nconf']['data_cadastro'];
		}
		$this->render('caixas/saida', array(
							'model' => $model,
		));
	}
	
	public function actionPublicas()
	{
		$model = new Nconf('publicas');
		$model->unsetAttributes(); // clear any default values
		
		if (isset($_GET['Nconf']))
		$model->attributes = $_GET['Nconf'];
		
		$this->render('caixas/publica', array(
							'model' => $model,
		));
	}
	
	public function actionHistorico()
	{
		$model = new Nconf('historico');
		$model->unsetAttributes(); // clear any default values
	
		if (isset($_GET['Nconf']))
		$model->attributes = $_GET['Nconf'];
	
		$this->render('caixas/historico', array(
								'model' => $model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() //TO-DO: ALTERAR TUDO ISSO
	
	{
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
			unset($_GET['pageSize']); // would interfere with pager and repetitive page size change
			}
		$model = new Nconf('search');
		$model->unsetAttributes(); // clear any default values

		if (isset($_GET['Nconf']))
			$model->attributes = $_GET['Nconf'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id, $mod = 'Nconf')
	{
		$model = Nconf::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'Registro n&atilde;o encontrado.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model, $mod = 'def')
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'nconf-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
