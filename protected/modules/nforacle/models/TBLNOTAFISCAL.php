<?php

/**
 * This is the model class for table "TBLNOTAFISCAL".
 *
 * The followings are the available columns in table 'TBLNOTAFISCAL':
 * @property double $IDNOTAFISCAL
 * @property string $E_S
 * @property double $IDTIPONF
 * @property string $SERIE
 * @property integer $NUMNOTA
 * @property integer $NUMFOLHA
 * @property string $NOTA_FATURA
 * @property double $IDNATOPERACAO
 * @property double $QUANTIDADE
 * @property string $DATAEMISSAO
 * @property string $ESPECIE
 * @property string $DATAENTRADASAIDA
 * @property string $MARCA
 * @property string $NUMERO
 * @property double $IDCONDPAG
 * @property double $PESOBRUTO
 * @property double $PESO_LIQUIDO
 * @property string $PLACAVEICTRANSP
 * @property double $IDTIPOFRETE
 * @property string $DSCCOMPLEMENTAR
 * @property double $IDDESTINATARIO_EMITENTE
 * @property double $ID_TRANSPORTADORA
 * @property double $NUM_CONTROL_FORM
 * @property string $IMPRESSA
 * @property string $CANCELADA
 * @property string $MOTIVO_CANCELAMENTO
 * @property string $DATAHORA_CANC
 * @property double $IDEMPRESA
 * @property double $QUANTIDADE_OR
 * @property string $STATUS
 * @property string $CANHOTO
 * @property string $DATA_CANHOTO
 * @property string $OBS_CANHOTO
 * @property double $ID_USUARIO
 * @property double $ID_MOTORISTA
 * @property double $IDNOTAFISCALORIGEM
 * @property string $DATA_INCLUSAO
 * @property double $NFE_LOTE
 * @property string $NFE_PROTOCOLO
 * @property string $NFE_DATA_PROCESSAMENTO
 * @property string $NFE_CHAVE
 * @property string $NFE_ERRO
 * @property double $NFE_STATUS
 * @property string $NFE_MOTIVO
 * @property double $MODELO
 * @property string $NFE_CMD
 */
class TBLNOTAFISCAL extends OActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TBLNOTAFISCAL the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getDbConnection() {
		return self::getDboConnection();
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBLNOTAFISCAL';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		/* SELECT N.* FROM TBLNOTAFISCAL N WHERE NOT EXISTS (SELECT IDNFS FROM COB_BOLETO_NFS S WHERE S.IDNF = N.IDNF) 
		 * 
		 * VALOR NF ESTÁ NA TABELA FEC_NOTAFISCAL
		 * 
		 */
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDTIPONF, NUMNOTA, IDNATOPERACAO, DATAEMISSAO, IDCONDPAG', 'required'),
			array('NUMNOTA, NUMFOLHA', 'numerical', 'integerOnly'=>true),
			array('IDTIPONF, IDNATOPERACAO, QUANTIDADE, IDCONDPAG, PESOBRUTO, PESO_LIQUIDO, IDTIPOFRETE, IDDESTINATARIO_EMITENTE, ID_TRANSPORTADORA, NUM_CONTROL_FORM, IDEMPRESA, QUANTIDADE_OR, ID_USUARIO, ID_MOTORISTA, IDNOTAFISCALORIGEM, NFE_LOTE, NFE_STATUS, MODELO', 'numerical'),
			array('E_S, IMPRESSA, CANCELADA, STATUS, CANHOTO, NFE_CMD', 'length', 'max'=>1),
			array('SERIE, PLACAVEICTRANSP', 'length', 'max'=>10),
			array('NOTA_FATURA', 'length', 'max'=>2),
			array('ESPECIE, MARCA, NUMERO', 'length', 'max'=>20),
			array('DSCCOMPLEMENTAR', 'length', 'max'=>2000),
			array('MOTIVO_CANCELAMENTO', 'length', 'max'=>60),
			array('OBS_CANHOTO', 'length', 'max'=>120),
			array('NFE_PROTOCOLO', 'length', 'max'=>15),
			array('NFE_CHAVE', 'length', 'max'=>44),
			array('NFE_ERRO, NFE_MOTIVO', 'length', 'max'=>800),
			array('DATAENTRADASAIDA, DATAHORA_CANC, DATA_CANHOTO, DATA_INCLUSAO, NFE_DATA_PROCESSAMENTO', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDNOTAFISCAL, E_S, IDTIPONF, SERIE, NUMNOTA, NUMFOLHA, NOTA_FATURA, IDNATOPERACAO, QUANTIDADE, DATAEMISSAO, ESPECIE, DATAENTRADASAIDA, MARCA, NUMERO, IDCONDPAG, PESOBRUTO, PESO_LIQUIDO, PLACAVEICTRANSP, IDTIPOFRETE, DSCCOMPLEMENTAR, IDDESTINATARIO_EMITENTE, ID_TRANSPORTADORA, NUM_CONTROL_FORM, IMPRESSA, CANCELADA, MOTIVO_CANCELAMENTO, DATAHORA_CANC, IDEMPRESA, QUANTIDADE_OR, STATUS, CANHOTO, DATA_CANHOTO, OBS_CANHOTO, ID_USUARIO, ID_MOTORISTA, IDNOTAFISCALORIGEM, DATA_INCLUSAO, NFE_LOTE, NFE_PROTOCOLO, NFE_DATA_PROCESSAMENTO, NFE_CHAVE, NFE_ERRO, NFE_STATUS, NFE_MOTIVO, MODELO, NFE_CMD', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDNOTAFISCAL' => 'Idnotafiscal',
			'E_S' => 'E S',
			'IDTIPONF' => 'Idtiponf',
			'SERIE' => 'Serie',
			'NUMNOTA' => 'Numnota',
			'NUMFOLHA' => 'Numfolha',
			'NOTA_FATURA' => 'Nota Fatura',
			'IDNATOPERACAO' => 'Idnatoperacao',
			'QUANTIDADE' => 'Quantidade',
			'DATAEMISSAO' => 'Dataemissao',
			'ESPECIE' => 'Especie',
			'DATAENTRADASAIDA' => 'Dataentradasaida',
			'MARCA' => 'Marca',
			'NUMERO' => 'Numero',
			'IDCONDPAG' => 'Idcondpag',
			'PESOBRUTO' => 'Pesobruto',
			'PESO_LIQUIDO' => 'Peso Liquido',
			'PLACAVEICTRANSP' => 'Placaveictransp',
			'IDTIPOFRETE' => 'Idtipofrete',
			'DSCCOMPLEMENTAR' => 'Dsccomplementar',
			'IDDESTINATARIO_EMITENTE' => 'Iddestinatario Emitente',
			'ID_TRANSPORTADORA' => 'Id Transportadora',
			'NUM_CONTROL_FORM' => 'Num Control Form',
			'IMPRESSA' => 'Impressa',
			'CANCELADA' => 'Cancelada',
			'MOTIVO_CANCELAMENTO' => 'Motivo Cancelamento',
			'DATAHORA_CANC' => 'Datahora Canc',
			'IDEMPRESA' => 'Idempresa',
			'QUANTIDADE_OR' => 'Quantidade Or',
			'STATUS' => 'Status',
			'CANHOTO' => 'Canhoto',
			'DATA_CANHOTO' => 'Data Canhoto',
			'OBS_CANHOTO' => 'Obs Canhoto',
			'ID_USUARIO' => 'Id Usuario',
			'ID_MOTORISTA' => 'Id Motorista',
			'IDNOTAFISCALORIGEM' => 'Idnotafiscalorigem',
			'DATA_INCLUSAO' => 'Data Inclusao',
			'NFE_LOTE' => 'Nfe Lote',
			'NFE_PROTOCOLO' => 'Nfe Protocolo',
			'NFE_DATA_PROCESSAMENTO' => 'Nfe Data Processamento',
			'NFE_CHAVE' => 'Nfe Chave',
			'NFE_ERRO' => 'Nfe Erro',
			'NFE_STATUS' => 'Nfe Status',
			'NFE_MOTIVO' => 'Nfe Motivo',
			'MODELO' => 'Modelo',
			'NFE_CMD' => 'Nfe Cmd',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IDNOTAFISCAL',$this->IDNOTAFISCAL);
		$criteria->compare('E_S',$this->E_S,true);
		$criteria->compare('IDTIPONF',$this->IDTIPONF);
		$criteria->compare('SERIE',$this->SERIE,true);
		$criteria->compare('NUMNOTA',$this->NUMNOTA);
		$criteria->compare('NUMFOLHA',$this->NUMFOLHA);
		$criteria->compare('NOTA_FATURA',$this->NOTA_FATURA,true);
		$criteria->compare('IDNATOPERACAO',$this->IDNATOPERACAO);
		$criteria->compare('QUANTIDADE',$this->QUANTIDADE);
		$criteria->compare('DATAEMISSAO',$this->DATAEMISSAO,true);
		$criteria->compare('ESPECIE',$this->ESPECIE,true);
		$criteria->compare('DATAENTRADASAIDA',$this->DATAENTRADASAIDA,true);
		$criteria->compare('MARCA',$this->MARCA,true);
		$criteria->compare('NUMERO',$this->NUMERO,true);
		$criteria->compare('IDCONDPAG',$this->IDCONDPAG);
		$criteria->compare('PESOBRUTO',$this->PESOBRUTO);
		$criteria->compare('PESO_LIQUIDO',$this->PESO_LIQUIDO);
		$criteria->compare('PLACAVEICTRANSP',$this->PLACAVEICTRANSP,true);
		$criteria->compare('IDTIPOFRETE',$this->IDTIPOFRETE);
		$criteria->compare('DSCCOMPLEMENTAR',$this->DSCCOMPLEMENTAR,true);
		$criteria->compare('IDDESTINATARIO_EMITENTE',$this->IDDESTINATARIO_EMITENTE);
		$criteria->compare('ID_TRANSPORTADORA',$this->ID_TRANSPORTADORA);
		$criteria->compare('NUM_CONTROL_FORM',$this->NUM_CONTROL_FORM);
		$criteria->compare('IMPRESSA',$this->IMPRESSA,true);
		$criteria->compare('CANCELADA',$this->CANCELADA,true);
		$criteria->compare('MOTIVO_CANCELAMENTO',$this->MOTIVO_CANCELAMENTO,true);
		$criteria->compare('DATAHORA_CANC',$this->DATAHORA_CANC,true);
		$criteria->compare('IDEMPRESA',$this->IDEMPRESA);
		$criteria->compare('QUANTIDADE_OR',$this->QUANTIDADE_OR);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('CANHOTO',$this->CANHOTO,true);
		$criteria->compare('DATA_CANHOTO',$this->DATA_CANHOTO,true);
		$criteria->compare('OBS_CANHOTO',$this->OBS_CANHOTO,true);
		$criteria->compare('ID_USUARIO',$this->ID_USUARIO);
		$criteria->compare('ID_MOTORISTA',$this->ID_MOTORISTA);
		$criteria->compare('IDNOTAFISCALORIGEM',$this->IDNOTAFISCALORIGEM);
		$criteria->compare('DATA_INCLUSAO',$this->DATA_INCLUSAO,true);
		$criteria->compare('NFE_LOTE',$this->NFE_LOTE);
		$criteria->compare('NFE_PROTOCOLO',$this->NFE_PROTOCOLO,true);
		$criteria->compare('NFE_DATA_PROCESSAMENTO',$this->NFE_DATA_PROCESSAMENTO,true);
		$criteria->compare('NFE_CHAVE',$this->NFE_CHAVE,true);
		$criteria->compare('NFE_ERRO',$this->NFE_ERRO,true);
		$criteria->compare('NFE_STATUS',$this->NFE_STATUS);
		$criteria->compare('NFE_MOTIVO',$this->NFE_MOTIVO,true);
		$criteria->compare('MODELO',$this->MODELO);
		$criteria->compare('NFE_CMD',$this->NFE_CMD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}