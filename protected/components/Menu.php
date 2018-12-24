<?php
	class Menu {
    	
	/*protected function registerClientScript()
	{
		$wid_path = $js = Yii::app()->request->baseUrl.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR.'gui_menu';
		//$css = $wid_path.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'estrutura.css';
		$jq = $wid_path.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'jquery-1.4.4.min.js';
		//$js = $wid_path.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'togglers.js';
		
		$cs = Yii::app()->clientScript;
		$cs->registerCssFile($css);
		$cs->registerScriptFile($jq);   
		$cs->registerScriptFile($js);
	}*/
		
    public static function dropDown($array=array()) {
     if(empty($array)) return null;

        $html = '<ul class="menuDropDown">';
        foreach($array as $titulo=>$itens) {
            if(!is_array($itens)) {
                $html .= "<li>";
                if(strtoupper($titulo) == @strtoupper($_GET['menu'])) {
                    $html .= "<div class='title opened'><a href='".self::normalizeUrl($itens,$titulo)."'>{$titulo}</a></div>";
                } else {
                    $html .= "<div class='title'><a href='".self::normalizeUrl($itens,$titulo)."'>{$titulo}</a></div>";
                }
            } else {

                if(strtoupper($titulo) == @strtoupper($_GET['menu'])) {
                    $html .= "<li class='clickable'>";
                    $html .= "<div class='title opened'>{$titulo}</div>";
                    $html .= '<ul style="display:block;">';
                } else {
                    $html .= "<li class='clickable'>";
                    $html .= "<div class='title'>{$titulo}</div>";
                    $html .= '<ul>';
                }
                foreach($itens as $v) {
                    $html .= "<li><a href='".self::normalizeUrl($v['link'],$titulo)."'>{$v['nome']}</a></li>";
                }
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
		
		$str = <<<'EOT'
		$(function(){
    $('ul.toolbar li.dropDown').mouseover(function(){
        $(this).addClass('opened');
        $(this).find('ul').show();
    }).mouseleave(function(){
        $(this).removeClass('opened');
        $(this).find('ul').hide();
    });
    
    $('ul.toolbar li ul li').click(function(e){
        location.href = $(this).find('a').attr('href');
    });

    $('ul.menuDropDown li.clickable').click(function(){
        $(this).find('div.title').toggleClass('opened');
        $(this).find('ul').toggle('fast');
    });

    $('ul.menuDropDown li:not(.clickable)').click(function(){
        location.href = $(this).find('a').attr('href');
    });
});
EOT;
		
		Yii::app()->clientScript->registerScript('exMenu',$str);

        return $html;
    }

    public static function normalizeUrl($link,$titulo) {
        if(preg_match("'\?'",$link)) {
            return $link.'&menu='.$titulo;
        } else {
            return $link.'?menu='.$titulo;
        }
    }

    public static function quickToolbar($array=array()) {
        if(empty($array)) return null;

        $html = '<ul class="toolbar quickToolbar">';
        foreach($array as $titulo=>$itens) {
            if(!is_array($itens)) {
                $html .= "<li>";
                $html .= "<a href='{$itens}'>{$titulo}</a>";
            } else {
                $html .= "<li class='dropDown'>";
                $html .= "<span>{$titulo}</span>";
                $html .= '<ul class="shadow">';
                foreach($itens as $v) {
                    $html .= "<li><a href='{$v['link']}'>{$v['nome']}</a></li>";
                }
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        $html .= '</ul>';

        return $html;
    }
}
