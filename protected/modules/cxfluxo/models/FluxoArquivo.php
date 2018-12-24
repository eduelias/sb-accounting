<?php

Yii::import('application.modules.cxfluxo.models._base.BaseFluxoArquivo');

class FluxoArquivo extends BaseFluxoArquivo
{
	public $file;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function rules() {
		return array(
		array('idarquivo, idfluxo, data', 'required'),
		array('idarquivo, idfluxo', 'numerical', 'integerOnly'=>true),
		array('descricao', 'length', 'max'=>255),
		array('descricao', 'default', 'setOnEmpty' => true, 'value' => null),
		array('file','file','types'=>'jpg,gif,png,pdf'),
		array('idfluxo_arquivo, idarquivo, idfluxo, data, descricao', 'safe', 'on'=>'search'),
		);
	}
	
	public function lista($id){
		$c = new CDbCriteria;
		
		$c->addCondition('idfluxo = '.$id);
		
		return new CActiveDataProvider('FluxoArquivo',array('criteria'=>$c));
	}
} 