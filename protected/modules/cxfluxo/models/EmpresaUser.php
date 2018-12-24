<?php

Yii::import('application.modules.cxfluxo.models._base.BaseEmpresaUser');

class EmpresaUser extends BaseEmpresaUser
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}