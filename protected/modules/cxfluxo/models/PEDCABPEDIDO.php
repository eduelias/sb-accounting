<?php

Yii::import('application.modules.cxfluxo.models._base.BasePEDCABPEDIDO');

class PEDCABPEDIDO extends BasePEDCABPEDIDO
{
	public function getDbConnection(){
		
		return self::getDboConnection();
		
	}
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}