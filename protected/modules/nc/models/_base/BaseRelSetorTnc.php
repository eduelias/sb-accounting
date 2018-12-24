<?php

/**
 * This is the model base class for the table "rel_setor_tnc".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RelSetorTnc".
 *
 * Columns in table "rel_setor_tnc" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $idsetor
 * @property integer $idnconf
 *
 */
abstract class BaseRelSetorTnc extends SActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'rel_setor_tnc';
	}

	public static function representingColumn() {
		return array(
			'idsetor',
			'idnconf',
		);
	}

	public function rules() {
		return array(
			array('idsetor, idnconf', 'required'),
			array('idsetor, idnconf', 'numerical', 'integerOnly'=>true),
			array('idsetor, idnconf', 'safe', 'on'=>'search'),
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
			'idsetor' => Yii::t('app', 'Idsetor'),
			'idnconf' => Yii::t('app', 'Idnconf'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idsetor', $this->idsetor);
		$criteria->compare('idnconf', $this->idnconf);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}