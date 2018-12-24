<?php

/**
 * This is the model base class for the table "cad_produtos_tipo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CadProdutosTipo".
 *
 * Columns in table "cad_produtos_tipo" available as properties of the model,
 * followed by relations of table "cad_produtos_tipo" available as properties of the model.
 *
 * @property integer $idprodutos_tipo
 * @property string $descricao
 *
 * @property CadProdutos[] $cadProdutoses
 */
abstract class BaseCadProdutosTipo extends SActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'cad_produtos_tipo';
	}

	public static function representingColumn() {
		return 'descricao';
	}

	public function rules() {
		return array(
			array('descricao', 'length', 'max'=>100),
			array('descricao', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idprodutos_tipo, descricao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'produtos' => array(self::HAS_MANY, 'CadProdutos', 'idtipo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idprodutos_tipo' => Yii::t('app', 'Idprodutos Tipo'),
			'descricao' => Yii::t('app', 'Descricao'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idprodutos_tipo', $this->idprodutos_tipo);
		$criteria->compare('descricao', $this->descricao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}