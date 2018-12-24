<?php

Yii::import('application.modules.cxfluxo.models._base.BaseConta');

class Conta extends BaseConta
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function recebeConta($id){ //id da empresa
		$t = false;
		
		foreach ($this->empresas as $empresa) {
			$t = ($empresa->idempresa === $id) || $t;
		}
			
		return $t;
	}
	
}