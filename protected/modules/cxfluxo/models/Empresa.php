<?php

Yii::import('application.modules.cxfluxo.models._base.BaseEmpresa');

class Empresa extends BaseEmpresa
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function representingColumn() {
		return 'nome';
	}
	
	public function recebeConta($id){
		$t = false;
		
		foreach ($this->contas as $conta) {
			$t = ($conta->idconta === $id) || $t;
		}
			
		return $t;
	}
}