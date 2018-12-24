<?php
class FluxoController extends Controller {
	public $titulo = 'Fluxo';
	public function init()
	{
		$this->module->registerScripts();
	}
	public function filters()
	{
		return array(
			'rights',
		);
	}
	public function actionView($id)
	{
		$this->render('view',
			array(
			'model' => $this->loadModel($id, 'Fluxo'),
		));
	}
	public function actionCapcreate()
	{
		$this->titulo = 'Contas a Pagar: Inserindo';
		$this->actionCreate('pagar');
	}
	public function actionCarcreate()
	{
		$this->titulo = 'Contas a Receber: Inserindo';
		$this->actionCreate('receber');
	}
	public function actionImportar()
	{
		//$a =  FluxoImport::getLastImport();
		//$b =  explode('/',$a);
		
		$a = new DateTime(FluxoImport::getLastImport());  //date('dd/mm/YY', mktime(0,0,0, string $b[1], string $b[0], string $b[2]));
		$datainicio = $a->format('d/m/Y');
		date_add($a, date_interval_create_from_date_string('1 day'));
		$datafim = $a->format('d/m/Y');
		$debug = FluxoImport::importarNfs($datainicio, $datafim);
		//$this->actionCarindex();
		$model = new Fluxo('baixa');
		$model->unsetAttributes();
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		if (isset($_POST['Fluxo']))
			$model->attributes = $_POST['Fluxo'];
		if (isset($_POST['yt0']) && $_POST['yt0'] == 'Versão para Impressão')
			$this->renderPartial('imprimir', array('model' => $model, 'dp' => $model->caphistorico()));
		else
			$this->renderPartial('_grid',
				array(
				'model'         => $model,
				//'debug'         => array($datainicio, $datafim),
				'dp'            => $model->carbaixa(),
				'buttom'        => '{work}{baixa}{update}{delete}',
				'filtroOrigem'  => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
				null, true,
				array( 
					'order' => 'nome asc',
				))),
				'filtroDestino' => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
				null, true,
				array(
					'order'     => 'nome asc',
					'condition' => 'dogrupo'
				))),
			));
	}
	public function actionAutobaixa()
	{
		$debug = FluxoImport::importarBaixas();
		
		$model = new Fluxo('baixa');
		$model->unsetAttributes();
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		if (isset($_POST['Fluxo'])) 
			$model->attributes = $_POST['Fluxo'];
		if (isset($_POST['yt0']) && $_POST['yt0'] == 'Versão para Impressão')
			$this->renderPartial('imprimir', array('model' => $model, 'dp' => $model->caphistorico()));
		else
			$this->renderPartial('_grid',
				array(
				'model'         => $model,
				'debug'         => $debug,
				'dp'            => $model->carbaixa(),
				'buttom'        => '{work}{baixa}{update}{delete}',
				'filtroOrigem'  => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
				null, true,
				array(
					'order' => 'nome asc',
				))),
				'filtroDestino' => GxHtml::listDataEx(Empresa::model()->findAllAttributes(
				null, true,
				array(
					'order'     => 'nome asc',
					'condition' => 'dogrupo'
				))),
			));
	}
	public function actionCaptodas()
	{
		$this->titulo = 'Contas a Pagar: TODAS';
		$model = new Fluxo('todas');
		$model->unsetAttributes();
		//$model->data_pagamento = null;
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		if (isset($_POST['Fluxo']))
			$model->attributes = $_POST['Fluxo'];
		if (isset($_POST['yt0']) && $_POST['yt0'] == 'Versão para Impressão')
			$this->renderPartial('imprimir', array('model' => $model, 'dp' => $model->captodas()));
		else
			$this->render('pagar/todas', array(
				'model' => $model,
			));
	}
	public function actionCaphistorico()
	{
		$this->titulo = 'Contas a Pagar: Histórico';
		$model = new Fluxo('historico');
		$model->unsetAttributes();
		//$model->data_pagamento = null;
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		if (isset($_POST['Fluxo']))
			$model->attributes = $_POST['Fluxo'];
		if (isset($_POST['yt0']) && $_POST['yt0'] == 'Versão para Impressão')
			$this->renderPartial('imprimir', array('model' => $model, 'dp' => $model->caphistorico()));
		else
			$this->render('pagar/historico', array(
				'model' => $model,
			));
	}
	public function actionCarhistorico()
	{
		$this->titulo = 'Contas a Receber: Histórico';
		$model = new Fluxo('historico');
		$model->unsetAttributes();
		//$model->data_pagamento = null;
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		if (isset($_POST['Fluxo']))
			$model->attributes = $_POST['Fluxo'];
		if (isset($_POST['yt0']) && $_POST['yt0'] == 'Versão para Impressão')
			$this->renderPartial('imprimir', array('model' => $model, 'dp' => $model->carhistorico()));
		else
			$this->render('receber/historico', array(
				'model' => $model,
			));
	}
	public function actionTutorial($tutorial = 'index')
	{
		switch ($tutorial) {
			case 'index':
				{
					$this->render('tutoriais/index');
					break;
				}
			case 'car_ins':
				{
					$this->render('tutoriais/car_ins');
					break;
				}
			case 'cap_ins':
				{
					$this->render('tutoriais/cap_ins');
					break;
				}
			case 'baixa':
				{
					$this->render('tutoriais/baixa');
					break;
				}
			default:
				{
					$this->render('index');
				}
		}
	}
	public function actionCreate($tipo = 'pagar')
	{
		$arquivo = false;
		$this->titulo = ($tipo == 'pagar') ? "Contas a Pagar: Inserindo" : "Contas a Receber: Inserindo";
		$str = ($tipo == 'pagar') ? 'pagar/' : 'receber/';
		$suff = ($tipo == 'pagar') ? 'cap' : 'car';
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
				if ($_POST['Fluxo']['file'] != '') {
					$model->file = CUploadedFile::getInstance($model, 'file');
					$ax = explode('.', $model->file);
					$filename = uniqid().'.'.$ax[count($ax) - 1];
					$filepath = Yii::app()->basePath.'/../images/fluxo/'.$filename;
					//$model->file = uniqid().'_'.$model->file;
					$model->file->saveAs($filepath);
					$model->filename = '/images/fluxo/'.$filename;
					$a = new Arquivo;
					$a->iduser = Yii::app()->user->id;
					$a->path = Yii::app()->basePath.'/../images/';
					$a->filename = $filename;
					$a->real_name = CHtml::encode($model->file);
					$a->ext = $ax[count($ax) - 1];
					$a->save(false);
					$fa = new FluxoArquivo;
					$fa->idarquivo = $a->idarquivo;
					$fa->descricao = 'Documento submetido na inserção.';
					$arquivo = true;
				}
				if ($model->save()) {
					if ($arquivo)
						$fa->idfluxo = $model->idfluxo;
					if ($arquivo)
						$fa->save(false);
					if (Yii::app()->request->isAjaxRequest)
						Yii::app()->end();
					else {
						if (((int) $model->getTotal()) and (($model->getTotal() + $model->valor_boleto) < $model->valor_fatura
						or ($model->getTotal() + $model->valor_boleto) < $model->moedaToSql($model->valor_fatura))) {
							$model2 = new Fluxo('Create');
							$model2->iduser = Yii::app()->user->id;
							$model2->file = CUploadedFile::getInstance($model, 'file');
							$model2->idempresa_origem = $model->idempresa_origem;
							$model2->idempresa_destino = $model->idempresa_destino;
							$model2->idccusto = $model->idccusto;
							$model2->idconta = $model->idconta;
							$dt = new DateTime($model->data_faturamento);
							$model2->data_faturamento = $dt->format('d/m/Y');
							$model2->nf = $model->nf;
							$model2->valor_fatura = $model->valor_fatura;
							$model2->valor_boleto = $model->valor_boleto;
							//$dataux = date('Y-m-d', CDateTimeParser::parse($model->data_vencimento, Yii::app()->locale->dateFormat));
							$date = new DateTime($model->data_vencimento);
							$date->add(new DateInterval('P1M'));
							$model2->data_vencimento = $date->format('d/m/Y');
							Yii::app()->user->setFlash('success', "Entrada inserida. NF# $model->nf, Valor até agora: ".Yii::app()->NumberFormatter->formatCurrency($model->getTotal(), 'BRL'));
							$this->render($str.'create',
								array(
								'model'   => $model2,
								'cap'     => (($tipo == 'pagar') ? true : false),
								'origem'  => ($tipo == 'pagar') ? 'dogrupo' : 'true',
								'destino' => ($tipo == 'pagar') ? 'true' : 'dogrupo'
							));
							Yii::app()->end();
						} elseif ($model->valor_pagamento != null && $model->valor_pagamento > 0)
							$this->redirect(array($suff.'historico'));
						else {
							$this->redirect(array($suff.'index'));
						}
					}
				}
			}
		}
		$this->render($str.'create',
			array(
			'model'   => $model,
			'cap'     => (($tipo == 'pagar') ? true : false),
			'origem'  => ($tipo == 'pagar') ? 'dogrupo' : 'true',
			'destino' => ($tipo == 'pagar') ? 'true' : 'dogrupo'
		));
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
					echo CJSON::encode(array(
						'status' => 'success',
						'div'    => 'Baixa Efetuada Com Sucesso!',
						'id'     => $model->idfluxo,
						'url'    => Yii::app()->createUrl(
						"cxfluxo/fluxo/baixa",
						array(
							"id" => $model->idfluxo
						))
					));
					Yii::app()->end();
				} else
					$this->redirect(array(
						'view', 'id' => $model->idfluxo
					));
			}
		} else {
			$model->valor_fatura = $model->sqlToMoeda($model->valor_fatura);
			$model->valor_boleto = $model->sqlToMoeda($model->valor_boleto);
			if ($model->valor_pagamento == 0)
				$model->valor_pagamento = $model->valor_fatura;
			if ($model->data_pagamento == '')
				$model->data_pagamento = $model->data_vencimento;
		}
		if (Yii::app()->request->isAjaxRequest) {
			echo CJSON::encode(array(
				'status' => 'failure',
				'div'    => $this->renderPartialWithHisOwnClientScript(
				'_formBaixaDialog',
				array(
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
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id, 'Fluxo');
		$cap = $model->idempresaOrigem->dogrupo;
		$this->performAjaxValidation($model, 'fluxo-form');
		if (isset($_POST['Fluxo'])) {
			$model->attributes = $_POST['Fluxo'];
			if ($model->save()) {
				$this->redirect(array(
					'view', 'id' => $model->idfluxo
				));
			}
		}
		$origem = ($cap) ? 'dogrupo' : 'true';
		$destino = ($cap) ? 'true' : 'dogrupo';
		$this->render('update',
			array(
			'model'   => $model,
			'origem'  => $origem,
			'destino' => $destino
		));
	}
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Fluxo')->delete();
			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array(
					'admin'
				));
		} else
			throw new CHttpException(400,
				Yii::t('app', 'Your request is invalid.'));
	}
	public function actionCapindex()
	{
		$this->titulo = 'Contas a Pagar: Baixa';
		$model = new Fluxo('baixa');
		$model->unsetAttributes();
		$model->data_pagamento = null;
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		if (isset($_POST['Fluxo']))
			$model->attributes = $_POST['Fluxo'];
		if (isset($_POST['yt0']) && $_POST['yt0'] == 'Versão para Impressão')
			$this->renderPartial('imprimir', array('model' => $model, 'dp' => $model->capbaixa()));
		else
			$this->render('pagar/baixa', array(
				'model' => $model,
			));
	}
	public function actionCarindex()
	{
		$this->titulo = 'Contas a Receber: Baixa';
		$model = new Fluxo('baixa');
		$model->unsetAttributes();
		$model->data_pagamento = null;
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		if (isset($_POST['Fluxo']))
			$model->attributes = $_POST['Fluxo'];
		if (isset($_POST['yt0']) && $_POST['yt0'] == 'Versão para Impressão')
			$this->renderPartial('imprimir', array('model' => $model, 'dp' => $model->carbaixa()));
		else
			$this->render('receber/baixa', array(
				'model' => $model,
			));
	}
	public function actionIndex()
	{
		$model = new Fluxo('search');
		$model->unsetAttributes();
		$model->data_pagamento = null;
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		$this->render('index', array(
			'model' => $model,
		));
	}
	public function actionAdmin()
	{
		$model = new Fluxo('search');
		$model->unsetAttributes();
		if (isset($_GET['Fluxo']))
			$model->attributes = $_GET['Fluxo'];
		$this->render('admin', array(
			'model' => $model,
		));
	}
}
