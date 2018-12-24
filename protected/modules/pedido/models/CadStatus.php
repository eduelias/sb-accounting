<?php

Yii::import('application.modules.pedido.models._base.BaseCadStatus');

class CadStatus extends BaseCadStatus
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function relations() {
		return array(
				'fluxoFormas' => array(self::MANY_MANY, 'FluxoForma', 'fforma_status(cad_status_idstatus, fluxo_forma_idfluxo_forma)'),
				'fluxos' => array(self::MANY_MANY, 'Fluxo', 'fluxo_status(idfluxo, idstatus)'),
				//'fluxoStatuses' => array(self::HAS_MANY, 'FluxoStatus', 'idstatus'),
		);
	}
	
	public function pivotModels() {
		return array(
				'fluxoFormas' => 'FformaStatus',
				'fluxos'=>'FluxoStatus'
		);
	}
}