<?php

/**
 * This is the model base class for the table "rel_User_setor".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RelUserSetor".
 *
 * Columns in table "rel_User_setor" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $iduser
 * @property integer $idsetor
 *
 */
abstract class BaseRelUserSetor extends SActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'rel_User_setor';
	}

	public static function representingColumn() {
		return array(
			'iduser',
			'idsetor',
		);
	}

	public function rules() {
		return array(
			array('iduser, idsetor', 'required'),
			array('iduser, idsetor', 'numerical', 'integerOnly'=>true),
			array('iduser, idsetor', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'iduser' => Yii::t('app', 'Iduser'),
			'idsetor' => Yii::t('app', 'Idsetor'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('iduser', $this->iduser);
		$criteria->compare('idsetor', $this->idsetor);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}