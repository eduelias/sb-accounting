<?php
/**
 * MMaske Class File
 * 
 * @author Eduardo Elias Saléh  <du7@msn;cp,	>
 * @version 1
 * @license http://www.opensource.org/licenses/mit-license.php MIT license
 * 
 * @desc PriceMask is a wrapper JQuery.price()
 */

class PriceMask extends CWidget {

	private $items = array();
    /**
     * @var string Path of the asset files after publishing.
     */
    private $assetsPath;
    
    /**
     * @var string the selected HTML elements
     */
    public $element;
    
    /**
     * @var array options for maskMoney 
     */
    public $config_st = array(
    		'prefix' => 'R$ ',
			'centsSeparator' => ',', 
			'thousandsSeparator' => '.',
			'limit' => false,
			'centsLimit' => 2,
			'clearPrefix' => true,
			'allowNegative' => false
    );
    
    public $config = array();
    
    /**
     * @var string this will be used to get the currency symbol if $config['symbol'] is not given
     */
    public $currency;
    
    
    public function init() {
        $assets = dirname(__FILE__) . '/' . 'assets';
        $this->assetsPath = Yii::app()->getAssetManager()->publish($assets);
        Yii::app()->getClientScript()->registerScriptFile($this->assetsPath . '/' . 'jquery.price_format.1.5.js');
    }

     public function run() {
     	$this->config = $this->config + $this->config_st;
         Yii::app()->clientScript->registerScript(uniqid(), '$("'.$this->element.'").priceFormat('.json_encode($this->config).')');
     }
}

?>
