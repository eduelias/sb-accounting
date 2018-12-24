<?php

class ComentarioController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	public $titulo = 'Comentários';
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
		return 'create';
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
			'model' => $this->loadModel($id, 'Comentario'),
		));
	}
	
	public function actionComenta($id){
		
		$nc = Nconf::model()->findByPk($id);
		
		$model = new Comentario;
		
		$model->idnconf = $nc->idnconf;
		
		if (isset($_POST['Comentario']['comentario']))
			$nc->addComent($_POST['Comentario']['comentario']);
		
		$model->nc->setLeu();
		
		$this->renderPartialWithHisOwnClientScript('_formDialog', array('model' => $model), false, true);
		
		//Yii::app()->end();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		if (!isset($id))
			throw new CHttpException(400, 'Link Inválido.');

		$model = new Comentario;

		$nc = Nconf::model()->findByPk($id);

		$model->idnconf = $id;

		$crit = new CDbCriteria;

		$crit->condition = 'idnconf = '.$id;

		$crit->order = 'data DESC';

		$dpc = new CActiveDataProvider('Comentario', array('criteria' => $crit));
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if (isset($_POST['Comentario'])) {
			$model->attributes = $_POST['Comentario'];
			if ($model->save(false))
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(array(
						'status' => 'success',
						'div'    => '<div class="flash-success">Comentário enviado com sucesso!</div>',
						'id'     => $model->idcomentario,
					));
					Yii::app()->end();
				} else {
					echo CJSON::encode(array('status'=>'failure','div'=>'ERRO!'));
					Yii::app()->end();
				}
		}

		$this->renderPartialWithHisOwnClientScript('_formDialog', array('model' => $model, 'model' => $model, 'nc' => $nc, 'dpc' => $dpc), false, true);
			
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id, 'Comentario');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Comentario'])) {
			$model->attributes = $_POST['Comentario'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->idcomentario));
		}

		$this->render('update', array(
			'model' => $model,
		));
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
			$this->loadModel($id, 'Comentario')->delete();

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
		$dataProvider = new CActiveDataProvider('Comentario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Comentario('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Comentario']))
			$model->attributes = $_GET['Comentario'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
