<?php

Yii::import('application.modules.cad_produto.models._base.BaseCadProdutosUnidade');

class CadProdutosUnidade extends BaseCadProdutosUnidade
{
	public $unid;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function representingColumn() {
		return 'simbolo';
	}
	
	protected function afterFind(){
		
		$this->unid = $this->simbolo.' ('.$this->unidade.')';
		
	}
}