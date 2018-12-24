<?php

/**
 * This is the model base class for the table "fluxo_forma".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "FluxoForma".
 *
 * Columns in table "fluxo_forma" available as properties of the model,
 * followed by relations of table "fluxo_forma" available as properties of the model.
 *
 * @property integer $idfluxo_forma
 * @property integer $entrada
 * @property string $descricao
 *
 * @property CadStatus[] $cadStatuses
 * @property Fluxo[] $fluxos
 */
abstract class BaseFluxoForma extends SActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'fluxo_forma';
	}

	public static function representingColumn() {
		return 'descricao';
	}

	public function rules() {
		return array(
			array('entrada', 'numerical', 'integerOnly'=>true),
			array('descricao', 'length', 'max'=>100),
			array('entrada, descricao', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idfluxo_forma, entrada, descricao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'cadStatuses' => array(self::MANY_MANY, 'CadStatus', 'fforma_status(fluxo_forma_idfluxo_forma, cad_status_idstatus)'),
			'fluxos' => array(self::HAS_MANY, 'Fluxo', 'idfluxo_forma'),
		);
	}

	public function pivotModels() {
		return array(
			'cadStatuses' => 'FformaStatus',
		);
	}

	public function attributeLabels() {
		return array(
			'idfluxo_forma' => Yii::t('app', 'Idfluxo Forma'),
			'entrada' => Yii::t('app', 'Entrada'),
			'descricao' => Yii::t('app', 'Descricao'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idfluxo_forma', $this->idfluxo_forma);
		$criteria->compare('entrada', $this->entrada);
		$criteria->compare('descricao', $this->descricao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}