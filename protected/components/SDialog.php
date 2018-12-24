<?php

	class SDialog extends CHtml {
		
		public static function ColumnButton($url){
			return array(
						'label'=>'[X]',
						'url'=>$url,
						'options'=>array('onclick'=>'{baixa($(this).attr("href")); return false;}',)
					);
		}

		/*public static function diagLink($controller)
		{
			$a = Yii::app()->getController();
			return parent::ajaxLink('[ + ]', $a->createUrl($controller . '/addnew'), array('onclick'=>'$("#' . $controller . '_d").dialog("open"); return false;',
				'update'=>'#' . $controller . '_d'), array('id'=>'s_' . $controller));
		}

		public static function diagDiv($controller)
		{

			return '<div id="' . $controller . '_d" style="display:none"></div>';

		}

		public static function place($controller)
		{

			return self::diagLink($controller) . self::diagDiv($controller);
		}

		public static function Botao($controller, $f_id)
		{
			return '<div class="row buttons">' . CHtml::ajaxSubmitButton('Criar', CHtml::normalizeUrl( array($controller . '/addnew',
				'render'=>false)), array('success'=>'js: function(data) {
                        $("#' . $f_id . '").append(data);
                        $("#' . $controller . '_d").dialog("close");
                    }'), array('id'=>'c_' . $controller.'_d')) . '</div>';
		}*/

	}
?>
