<?php

Yii::import('application.modules.nc.models._base.BaseStatus');

class Status extends BaseStatus
{
	private static $_list;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function getList()
	{
		if (self::$_list === null) {
			$a = self::model()->findAll();
			
			foreach ($a as $k=>$v) {
				self::$_list[$v->idstatus] = $v->descricao;
			}
		}
		
		return self::$_list;
	}
	
	public function relations() {
		return array(
				'relStatusNconfs' => array(self::HAS_MANY, 'RelStatusNconf', 'idstatus'),
				'nc' => array(self::MANY_MANY, 'Nconf', 'rel_status_nconf(idnconf, idstatus)'),
		);
	}
	
	protected function afterSave(){
	
		$this->nc->setNlida();
	
		return parent::afterSave();
	
	}
}