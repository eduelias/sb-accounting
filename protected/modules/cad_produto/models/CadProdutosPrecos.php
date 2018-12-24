<?php

Yii::import('application.modules.cad_produto.models._base.BaseCadProdutosPrecos');

class CadProdutosPrecos extends BaseCadProdutosPrecos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeSave(){
		
		if ($this->isNewRecord) {
				
			$this->iduser = Yii::app()->user->id;
				
			$this->data_cadastro = date('Y-m-d H:i:s');
		
		} else {
				
			$this->data_atualizacao = date('Y-m-d H:i:s');
				
		}
		
		return parent::beforeSave();
	}
}