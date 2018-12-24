<?php

Yii::import('application.modules.user.models._base.BaseMenu');

class Menu extends BaseMenu
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public $hasChilds;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Menu the static model class
	 */
	public function hasChilds()
	{		
		return (count($this->menus) > 0);
	}
	
	public static function childAsDp($model){
		$c = new CDbCriteria;
		$c->condition = 'idmenu_pai = '.$model->idmenu;
		$c->order = 'posicao asc';
		
		return new CActiveDataProvider('Menu',array('criteria'=>$c));
	}
	
	public function relations() {
		return array(
			'pai' => array(self::BELONGS_TO, 'Menu', 'idmenu_pai'),
			'menus' => array(self::HAS_MANY, 'Menu', 'idmenu_pai', 'order'=>'posicao ASC'),
		);
	}
	
	public static function asMenu($models)
	{
		$ret = array();
		
		foreach ($models as $model) {
			$n = array();
			$n['label']=$model->label;
			switch (true) {
				case $model->hasChilds():{
					$n['items']=self::asMenu($model->menus);
				};
				
				case !$model->url:{
					
				}break;
				
				case ($model->url_tipo == 'ativo'):{
					$n['url']=array('/'.str_replace('.','/',$model->url));
				}break;
				
				case ($model->url_tipo == 'direto'):{
					$n['url']=$model->url;	
				}break;
				
				default:{
					
				}break;
			}
			$n['visible'] = (Yii::app()->user->checkAccess(str_replace('/','.',$model->url)))? true : false;
			$ret[] = $n;
		}

		return $ret;
	}
	
	public static function geraMenu($idmenu = 1)
	{
		$c = new CDbCriteria;
		$c->condition='idmenu_pai = '.$idmenu;
		$c->order = 'posicao asc';
		$models = self::model()->findAll($c);
		
		$ret = self::asMenu($models);
		
		return $ret;
	}
	
	public static function getEnum($col = 'url_tipo')
	{
		$schema = self::model()->getTableSchema()->getColumn($col)->dbType;
		preg_match_all("/'([^']+)'/",$schema,$matches);
		$matches = array_combine($matches[1],$matches[1]);
		return $matches;
	}
}
