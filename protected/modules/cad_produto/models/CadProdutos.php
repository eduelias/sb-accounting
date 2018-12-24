<?php

Yii::import('application.modules.cad_produto.models._base.BaseCadProdutos');

class CadProdutos extends BaseCadProdutos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeSave(){
		
		if ($this->isNewRecord) {
			
			$this->idusuario = Yii::app()->user->id;
			
			$this->data_cadastro = date('Y-m-d H:i:s');
		
		} else {
			
			$this->data_atualizacao = date('Y-m-d H:i:s');
			
		}
		
		return parent::beforeSave();
	}
}