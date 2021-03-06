<?php

/**
 * This is the model base class for the table "fluxo_arquivo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "FluxoArquivo".
 *
 * Columns in table "fluxo_arquivo" available as properties of the model,
 * followed by relations of table "fluxo_arquivo" available as properties of the model.
 *
 * @property integer $idfluxo_arquivo
 * @property integer $idarquivo
 * @property integer $idfluxo
 * @property string $data
 * @property string $descricao
 *
 * @property Fluxo $idfluxo0
 * @property Arquivo $idarquivo0
 */
abstract class BaseFluxoArquivo extends SActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'fluxo_arquivo';
	}

	public static function representingColumn() {
		return 'data';
	}

	public function rules() {
		return array(
			array('idarquivo, idfluxo, data', 'required'),
			array('idarquivo, idfluxo', 'numerical', 'integerOnly'=>true),
			array('descricao', 'length', 'max'=>255),
			array('descricao', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idfluxo_arquivo, idarquivo, idfluxo, data, descricao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idfluxo0' => array(self::BELONGS_TO, 'Fluxo', 'idfluxo'),
			'idarquivo0' => array(self::BELONGS_TO, 'Arquivo', 'idarquivo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idfluxo_arquivo' => Yii::t('app', 'Idfluxo Arquivo'),
			'idarquivo' => Yii::t('app', 'Idarquivo'),
			'idfluxo' => Yii::t('app', 'Idfluxo'),
			'data' => Yii::t('app', 'Data'),
			'descricao' => Yii::t('app', 'Descricao'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idfluxo_arquivo', $this->idfluxo_arquivo);
		$criteria->compare('idarquivo', $this->idarquivo);
		$criteria->compare('idfluxo', $this->idfluxo);
		$criteria->compare('data', $this->data, true);
		$criteria->compare('descricao', $this->descricao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}