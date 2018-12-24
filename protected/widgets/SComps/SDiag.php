<?php
Yii::import('zii.widgets.jui.CJuiDialog');
class SDiag extends CJuiDialog {

	public $onSuccess = '';

	public $options_padrao = array(
		'autoOpen'  => false,
		'modal'     => true,
		'width'     => 'auto',
		'height'    => 'auto',
		'maxHeight' => 500,
		'show'      => 'clip',
		'onSuccess' => '',
		'close'     => 'js:function(e,ui){
					$(e.target.firstElementChild).empty();
				}',
	);

	public $field = false;

	public function init()
	{

		$this->options = array_merge($this->options_padrao, $this->options);

		parent::init();

		$s = "function ".$this->id."_handle(url, id){\r\n
					
					".CHtml::ajax(array(
			'url'      => 'js:url',
			'data'     => 'js:$("#'.$this->id.' div.'.$this->id.'Form form").serialize()',
			'type'     => 'post',
			'cache'    => false,
			'dataType' => 'json',
			'failure'  => "function(data){
						alert('houve um erro!');
					}",
			'success'  => "function(data){
						
						if (data.status == 'failure'){
							$('#".$this->id." div.".$this->id."Form').html(data.div);
							$('#".$this->id."').dialog('open');
							$('#".$this->id." div.".$this->id."Form form').submit(function(e){ return ".$this->id."_handle(e.target.action,id); });
						}else{
							$('#".$this->id." div.".$this->id."Form form').html(data.div);
							if ((typeof(id) !== 'undefined') && (data.tag !='')) {
								$('#'+id).append(data.tag);
								if (data.id != 0) $('#'+id).val(data.id);
							}
							".$this->onSuccess."
							setTimeout(\"$('#".$this->id."').dialog('close')\",2000);
						}
					}",
		)).";
				return false;
			}";
		Yii::app()->clientScript->registerScript(uniqid(), $s, CClientScript::POS_BEGIN);

		echo CHtml::openTag('div', array('class' => $this->id.'Form'))."\n";
	}

	public function buttom($url)
	{
		return array(
			'label'   => '&nbsp;',
			'url'     => $url,
			'options' => array('onclick' => '{'.$this->id.'_handle($(this).attr("href")); return false;}', 'class'=>'ic_oper')
		);
	}

	public function link($url, $campo)
	{
		return CHtml::link('&nbsp;',
			"",
			array(
			'class'   => 'ic_novo',
			'style'   => 'cursor:pointer; text-decoration:none;',
			'onclick' => "{".$this->id."_handle('".$url."','".$campo."'); $('#".$this->id."').dialog('open'); }"
		));
	}

	public function run()
	{
		echo CHtml::closeTag('div');
		parent::run();
	}

	/*public $options = array(
	 'title'=>'Adicionando:',
	 'autoOpen'=>true,
	 'modal'=>'true',
	 'width'=>'auto',
	 'height'=>'auto',
	 );
			
	 public function init(){
	 $this->options['close'] = 'js:function(e,ui){
	 $("body").undelegate("#c_'.$this->id.'","click");
	 $("#'.$this->id.'").empty();
	 }';
	 parent::init();
	 }*/
}
?>