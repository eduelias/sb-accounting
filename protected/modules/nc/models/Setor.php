<?php

Yii::import('application.modules.nc.models._base.BaseSetor');

class Setor extends BaseSetor
{
		
	private static $_setorlist;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function getSetorlist()
	{
		if (self::$_setorlist === null) {
			$a = self::model()->findAll();
			
			foreach ($a as $k=>$v) {
				self::$_setorlist[$v->idsetor] = $v->descricao;
			}
		}
		
		return self::$_setorlist;
	}
	
	public function relations() {
		return array(
			'nconfs' => array(self::HAS_MANY, 'Nconf', 'idsetor'),
			'users' => array(self::MANY_MANY, 'User', 'rel_User_setor(idsetor, iduser)'),
			'tipoNaoConformidades' => array(self::MANY_MANY, 'TipoNaoConformidade', 'rel_setor_tnc(idsetor, idnconf)'),
			'responsavel' => array(self::BELONGS_TO, 'User', 'iduser_responsavel'),
		);
	}
	
	public function attributeLabels() {
		return array(
			'idsetor' => Yii::t('app', 'Idsetor'),
			'iduser_responsavel' => Yii::t('app', 'Responsável'),
			'descricao' => Yii::t('app', 'Descrição'),
		);
	}
}