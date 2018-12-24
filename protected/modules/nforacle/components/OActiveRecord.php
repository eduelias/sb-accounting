<?php 
class OActiveRecord extends GxActiveRecord {
	
	private static $dbo = null;
	
	protected static function getDboConnection()
	{
		if(self::$dbo !== null)
			return self::$dbo;
		else
		{
			self::$dbo = Yii::app()->dbo;
			if(self::$dbo instanceof CDbConnection)
			{
				self::$dbo->setActive(true);
				return self::$dbo;
			}
			else
				throw new CDbException('Atenção, conexão com o ORACLE falhou!');
		}
	}
	
}
?>