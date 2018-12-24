<?php
class FluxoImport extends Fluxo {
	
	public function beforeSave(){
		
		return true;
		
	}
	
	public static function importarBoleto($idnotafiscal)
	{
		//$sql = "select n.idnotafiscal, n.numnota, b.valorpago, b.dataquitacao, b.datavencimento from cob_boleto b, cob_boleto_nfs s, tblnotafiscal n where b.id = s.idboleto and s.idnotafiscal = n.idnotafiscal and n.idnotafiscal = $idnotafiscal";
		$sql = "select n.idnotafiscal, b.valorpago, b.dataquitacao, to_char(b.datavencimento,'dd/mm/yyyy') as datavencimento, b.valortotal from cob_boleto b, cob_boleto_nfs s, tblnotafiscal n where b.id = s.idboleto and s.idnotafiscal = n.idnotafiscal and n.idnotafiscal = $idnotafiscal";
		$a = oci_connect('sis', 'sis', '11.11.3.2:1521/global', 'AL32UTF8');
		$b = oci_parse($a, $sql);
		oci_execute($b);
		if (!is_resource($b)) {
			$err = oci_error($b);
			return var_dump($err);
		}
		$ret = array();
		while ($row = oci_fetch_array($b, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$ret[] = $row;
		}
		return $ret;
	}
	public static function importarBaixas()
	{
		
		//$sql = "select n.idnotafiscal, n.numnota from cob_boleto b, cob_boleto_nfs s, tblnotafiscal n where b.id = s.idboleto and s.idnotafiscal = n.idnotafiscal and b.dataquitacao = to_date('$datainicio','dd/mm/yyyy');";
		
		
		$sql = "select n.idnotafiscal, (select count(b.idnotafiscal) from cob_boleto_nfs where cob_boleto_nfs.idboleto = b.id) as n_pra_m, b.valorpago, to_char(b.datavencimento,'dd/mm/yyyy') as datavencimento, to_char(b.dataquitacao,'dd/mm/yyyy') as dataquitacao from cob_boleto b, cob_boleto_nfs s, tblnotafiscal n where b.id = s.idboleto and s.idnotafiscal = n.idnotafiscal and b.valorpago is not null and";
		
		$c = new CDbCriteria;
			
		$c->select = 'id_sisfat';
		
		$c->limit = '1';
			
		$c->addCondition('data_pagamento is null');
			
		$c->addCondition('id_sisfat is not null');
			
		$c->order = 'id_sisfat ASC';
			
		$m = Fluxo::model()->find($c);
			
		$sql.= " n.idnotafiscal >= {$m->id_sisfat}";
		
		if (Fluxo::model()->exists('id_sisfat is not null and data_pagamento is not null')) {
			
			$c = new CDbCriteria;
			
			$c->select = 'data_pagamento,id_sisfat';
			
			$c->order = 'data_pagamento desc';
			
			$c->addCondition('data_pagamento is not null');

			$c->addCondition('id_sisfat is not null');
			
			$c->limit = '1';
			
			$m = Fluxo::model()->find($c);
			
			$sql.= " and b.dataquitacao >= to_date('{$m->data_pagamento}','dd/mm/yyyy');";
			
		} 
				
		//return $sql;
		
		$a = oci_connect('sis', 'sis', '11.11.3.2:1521/global', 'AL32UTF8');
		$b = oci_parse($a, $sql);
		
		
		oci_execute($b);
		if (!is_resource($b)) {
			$err = oci_error($b);
			return var_dump($err);
		}
		while ($row = oci_fetch_array($b, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$res = self::baixaFluxo($row);
		}
		return $res;
	}
	
	public static function baixaFluxo($item)
	{
		if (!Fluxo::model()->exists('id_sisfat = '.$item['IDNOTAFISCAL'])) {
			return false;
		}
		$m = Fluxo::model()->findByAttributes(array('id_sisfat' => $item['IDNOTAFISCAL']));
		$m->valor_fatura = str_replace('.',',',str_replace(',','',$m->valor_fatura));
		$m->valor_boleto = str_replace('.',',',str_replace(',','',$m->valor_boleto));
		$m->data_vencimento = $item['DATAVENCIMENTO'];
		$m->data_pagamento = $item['DATAQUITACAO'];
		$m->valor_pagamento =  ($item['N_PRA_M'])?str_replace('.',',',str_replace(',','',$item['VALORPAGO'])):$m->valor_fatura;
		$m->doc_numero = $item['DATAVENCIMENTO'].' '.$item['DATAQUITACAO'].' Total do Boleto:'.$item['VALORPAGO'];
		$m->idformaspg = 8;
		return $m->save(false);
	}
	public static function importarNfs($datainicio, $datafim)
	{
		if (!isset($datafim) and !isset($datafim))
			return false;
		$sql = "select n.idnotafiscal, n.numnota, p.id_pessoa, n.idempresa, f.valor_total_nota, to_char(n.dataemissao, 'dd/mm/YYYY') as dataemissao, p.razao_social, p.cnpj, p.boleto from tblnotafiscal n, tblfecnotafiscal f, pess_pessoa p where n.idnotafiscal = f.idnotafiscal and n.iddestinatario_emitente = p.id_pessoa	and n.e_s = 'S'	and n.cancelada is null and n.dataemissao between to_date('$datainicio','dd/mm/yyyy') and to_date('$datafim','dd/mm/yyyy')";
		//echo $sql;
		$a = oci_connect('sis', 'sis', '11.11.3.2:1521/global', 'AL32UTF8');
		$b = oci_parse($a, $sql);
		oci_execute($b);
		if (!is_resource($b)) {
			$err = oci_error($b);
			return var_dump($err);
		}
		while ($row = oci_fetch_array($b, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$res = self::insertFluxo($row);
		}
		return $res;
	}
	public static function insertFluxo($item)
	{
		if (!self::existeLancamento($item)) {
			$fluxo = new Fluxo;
			$fluxo->idempresa_destino = self::getEmpresaDestino($item);
			$fluxo->idempresa_origem = self::getCliente($item);
			$fluxo->idconta = 89;
			$fluxo->idccusto = 5;
			$fluxo->iduser = Yii::app()->user->id;
			$fluxo->data_faturamento = $item['DATAEMISSAO']; //FALTA PARSEAR??
			$fluxo->valor_fatura = str_replace('.',',',str_replace(',','',$item['VALOR_TOTAL_NOTA'])); //FALTA PARSEAR??
			$fluxo->id_sisfat = $item['IDNOTAFISCAL'];
			$fluxo->nf = $item['NUMNOTA'];
			$fluxo->tipo_sisfat = 'IMPORTADO NF';
			$fluxo->observacao = $item['IDNOTAFISCAL'].': IMP SISFAT PARA A EMPRESA:'.$fluxo->idempresa_destino;
			$aux = self::importarBoleto($item['IDNOTAFISCAL']);
			if (count($aux) > 0) { 
				$fluxo->data_vencimento = $aux[0]['DATAVENCIMENTO'];
				//$fluxo->valor_boleto = str_replace('.',',',$aux[0]['VALORTOTAL']);//*/
			}	
					 
			//return $aux;
			return $fluxo->save(false);
			//return 'Foi';
		}
	}
	public static function getEmpresaDestino($item)
	{
		if (Empresa::model()->exists('id_sisfat ='.$item['IDEMPRESA'])) {
			$m = Empresa::model()->findByAttributes(array('id_sisfat' => $item['IDEMPRESA']));
			return $m->idempresa;
		}
		return 2;
	}
	public static function getCliente($item)
	{
		if (Empresa::model()->exists('id_sisfat ='.$item['ID_PESSOA'])) {
			$m = Empresa::model()->findByAttributes(array('id_sisfat' => $item['ID_PESSOA']));
			return $m->idempresa;
		}
		$empresa = new Empresa('import');
		$empresa->nome = $item['RAZAO_SOCIAL'].' - '.$item['ID_PESSOA'];
		$empresa->documento = $item['CNPJ'];
		$empresa->descricao = 'INSERIDO AUTOMATICAMENTE';
		$empresa->id_sisfat = $item['ID_PESSOA'];
		@$empresa->save();
		return $empresa->idempresa;
	}
	public static function existeLancamento($item)
	{
		return Fluxo::model()->exists('id_sisfat ='.$item['IDNOTAFISCAL']);
	}
	
	public static function getLastImport(){
		
		$c = new CDbCriteria;
		
		$c->select = 'data_sistema';
		
		$c->addCondition('id_sisfat is not null');
		
		$c->order = 'data_sistema desc';
		
		$c->limit = 1;
		
		if (Fluxo::model()->exists($c)) {
			
			$m = Fluxo::model()->find($c);
			
			return $m->data_sistema;
			
		} else {
			
			return '01/11/2011';
			
		}
	}
}
?>