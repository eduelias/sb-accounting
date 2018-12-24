<?php

/**
 * This is the model base class for the table "cad_produtos_caracter".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CadProdutosCaracter".
 *
 * Columns in table "cad_produtos_caracter" available as properties of the model,
 * followed by relations of table "cad_produtos_caracter" available as properties of the model.
 *
 * @property integer $idprodutos_caracter
 * @property integer $idprodutos
 * @property string $dim_x
 * @property string $dim_y
 * @property string $dim_z
 * @property string $peso_bruto
 * @property string $peso_liquido
 *
 * @property CadProdutos $idprodutos0
 */
abstract class BaseCadProdutosCaracter extends SActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'cad_produtos_caracter';
	}

	public static function representingColumn() {
		return 'dim_x';
	}

	public function rules() {
		return array(
			array('idprodutos', 'required'),
			array('idprodutos', 'numerical', 'integerOnly'=>true),
			array('dim_x, dim_y, dim_z', 'length', 'max'=>7),
			array('peso_bruto, peso_liquido', 'length', 'max'=>9),
			array('dim_x, dim_y, dim_z, peso_bruto, peso_liquido', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idprodutos_caracter, idprodutos, dim_x, dim_y, dim_z, peso_bruto, peso_liquido', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idprodutos0' => array(self::BELONGS_TO, 'CadProdutos', 'idprodutos'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idprodutos_caracter' => Yii::t('app', 'Idprodutos Caracter'),
			'idprodutos' => Yii::t('app', 'Idprodutos'),
			'dim_x' => Yii::t('app', 'Dim X'),
			'dim_y' => Yii::t('app', 'Dim Y'),
			'dim_z' => Yii::t('app', 'Dim Z'),
			'peso_bruto' => Yii::t('app', 'Peso Bruto'),
			'peso_liquido' => Yii::t('app', 'Peso Liquido'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idprodutos_caracter', $this->idprodutos_caracter);
		$criteria->compare('idprodutos', $this->idprodutos);
		$criteria->compare('dim_x', $this->dim_x, true);
		$criteria->compare('dim_y', $this->dim_y, true);
		$criteria->compare('dim_z', $this->dim_z, true);
		$criteria->compare('peso_bruto', $this->peso_bruto, true);
		$criteria->compare('peso_liquido', $this->peso_liquido, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}