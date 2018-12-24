<?php
	/**
	 * Controller is the customized base controller class.
	 * All controller classes for this application should extend from this base class.
	 */
	class Controller extends GxController {
		/**
		 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
		 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
		 */
		public $layout = '//layouts/column1';

		/**
		 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
		 */
		public $menu = array();
		/**
		 * @var array the breadcrumbs of the current page. The value of this property will
		 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
		 * for more details on how to specify this property.
		 */
		public $breadcrumbs = array();

		public $titulo = 'Operações';

		public function init()
		{

			parent::init();

			//Yii::app()->setTheme('gui');

		}

		public function renderPartialWithHisOwnClientScript($view, $data = null, $return = false)
		{

			$mainClientScript = Yii::app()->clientScript;
			Yii::app()->setComponent('clientScript', new ZClientScript);
			$output = $this->renderPartial($view, $data, true);
			$output .= Yii::app()->clientScript->renderOnRequest();
			Yii::app()->setComponent('clientScript', $mainClientScript);

			if($return)
				return $output;
			else
				echo $output;
		}

		//public function filters() { return array( 'rights', ); }
	}

	class ZClientScript extends CClientScript {
		/**
		 * Inserts the scripts at the beginning of the body section.
		 * @param string the output to be inserted with scripts.
		 */
		public function renderOnRequest()
		{
			$html = '';
			foreach($this->scriptFiles as $scriptFiles) {
				foreach($scriptFiles as $scriptFile)
					$html .= CHtml::scriptFile($scriptFile) . "\n";
			}
			foreach($this->scripts as $script)
				$html .= CHtml::script(implode("\n", $script)) . "\n";

			if($html!=='')
				return $html;
		}

	}
