<?php

Yii::import('application.models._base.BaseArquivo');

class Arquivo extends BaseArquivo
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}