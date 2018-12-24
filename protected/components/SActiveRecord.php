<?php

 class SActiveRecord extends GxActiveRecord
 {
 	protected function beforeSave()
	{
		foreach($this->metadata->tableSchema->columns as $columnName => $column){                
			if ($column->dbType == 'date'){                    
				$this->$columnName = date('Y-m-d', CDateTimeParser::parse($this->$columnName, Yii::app()->locale->dateFormat)); 
				$this->$columnName = ($this->$columnName == '1969-12-31')?null:$this->$columnName;               
			}elseif ($column->dbType == 'datetime'){
				$this->$columnName = date('Y-m-d H:i:s', CDateTimeParser::parse($this->$columnName, 'dd/MM/yyyy hh:mm:ss'));  
				$this->$columnName = ($this->$columnName == '1969-12-31 21:00:00')?null:$this->$columnName;                
			}elseif ($column->dbType == 'timestamp'){
				$this->$columnName = null;                
			}				               
		}
		
		return parent::beforeSave();	
	}
	
	protected function beforeFind()
	{
		foreach($this->metadata->tableSchema->columns as $columnName => $column){
			if (isset($column->$columnName) and ($column->$columnName !== null)){                
				if ($column->dbType == 'date'){                    
					$this->$columnName = date('Y-m-d', CDateTimeParser::parse($this->$columnName, Yii::app()->locale->dateFormat)); 
					$this->$columnName = ($this->$columnName == '1969-12-31')?null:$this->$columnName;               
				}elseif ($column->dbType == 'datetime'){
					$this->$columnName = date('Y-m-d H:i:s', CDateTimeParser::parse($this->$columnName, 'dd/MM/yyyy hh:mm:ss'));  
					$this->$columnName = ($this->$columnName == '1969-12-31 21:00:00')?null:$this->$columnName;                
				}elseif ($column->dbType == 'timestamp'){
					$this->$columnName = null;                
				}				               
			}
		}
		
		return parent::beforeFind();	 
	}
 	
	protected function afterFind()
	{
		foreach($this->metadata->tableSchema->columns as $columnName => $column){                                        
			if (!strlen($this->$columnName)) continue;                                        
			if ($column->dbType == 'date'){                                                 
				$this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'yyyy-MM-dd'),'medium',null);                
				$this->$columnName = ($this->$columnName == '31/12/1969')?'':$this->$columnName;
				$this->$columnName = ($this->$columnName == '01/01/1970')?'':$this->$columnName;
			}elseif ($column->dbType == 'datetime'){                                
				$this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'yyyy-MM-dd hh:mm:ss')); 
				$this->$columnName = ($this->$columnName == '31/12/1969 21:00:00')?' ':$this->$columnName;  
				$this->$columnName = ($this->$columnName == '01/01/1970 00:00:00')?' ':$this->$columnName;                              
			}elseif ($column->dbType == 'timestamp'){                                
				$this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'yyyy-MM-dd hh:mm:ss'));
				$this->$columnName = ($this->$columnName == '31/12/1969 21:00:00')?'':$this->$columnName;                        
			}elseif ($column->dbType == 'time'){                                
				$this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'hh:mm:ss'));
				$this->$columnName = ($this->$columnName == '24:00:00')?'':$this->$columnName;                        
			}
			
		}

		return parent::afterFind();
	}

	public static function getEnum($col){
		$schema = self::model()->getTableSchema()->getColumn($col)->dbType;
		preg_match_all("/'([^']+)'/",$schema,$matches);
		$matches = array_combine($matches[1],$matches[1]);
		return $matches;
	}
}
?>
