<?php

/**
 * This is the model base class for the table "arquivo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Arquivo".
 *
 * Columns in table "arquivo" available as properties of the model,
 * followed by relations of table "arquivo" available as properties of the model.
 *
 * @property integer $idarquivo
 * @property integer $iduser
 * @property string $filename
 * @property string $path
 * @property string $ext
 * @property string $mime
 * @property string $data
 *
 * @property User $iduser0
 * @property FluxoArquivo[] $fluxoArquivos
 */
abstract class BaseArquivo extends SActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'arquivo';
	}

	public static function representingColumn() {
		return 'filename';
	}

	public function rules() {
		return array(
			array('idarquivo, iduser, filename, path, ext, data', 'required'),
			array('idarquivo, iduser', 'numerical', 'integerOnly'=>true),
			array('filename, path, mime, real_name', 'length', 'max'=>255),
			array('ext', 'length', 'max'=>4),
			array('mime', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idarquivo, iduser, filename, path, ext, mime, data', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'iduser0' => array(self::BELONGS_TO, 'User', 'iduser'),
			'fluxoArquivos' => array(self::HAS_MANY, 'FluxoArquivo', 'idarquivo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idarquivo' => Yii::t('app', 'Idarquivo'),
			'iduser' => Yii::t('app', 'Iduser'),
			'filename' => Yii::t('app', 'Filename'),
			'path' => Yii::t('app', 'Path'),
			'ext' => Yii::t('app', 'Ext'),
			'mime' => Yii::t('app', 'Mime'),
			'data' => Yii::t('app', 'Data'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idarquivo', $this->idarquivo);
		$criteria->compare('iduser', $this->iduser);
		$criteria->compare('filename', $this->filename, true);
		$criteria->compare('path', $this->path, true);
		$criteria->compare('ext', $this->ext, true);
		$criteria->compare('mime', $this->mime, true);
		$criteria->compare('data', $this->data, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}