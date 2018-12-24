<?php

Yii::import('application.modules.clifor.models._base.BaseCadClifor');

class CadClifor extends BaseCadClifor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeSave(){
	
		if ($this->isNewRecord) {
				
			$this->data_cadastro = date('Y-m-d H:i:s');
	
		} else {
				
			$this->data_atualizacao = date('Y-m-d H:i:s');
				
		}
	
		return parent::beforeSave();
	}
	
	
}